<?php

namespace App\Http\Controllers;

use App\Models\Catergory;
use App\Models\DeliveyCharges;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use DataTables;

class DeliveyChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DeliveyCharges::with('category')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                // ->addColumn('parent_id', function ($row) {
                //     if ($row->parent_id != null)
                //         return $row->parent_id;
                //     else
                //         return 'N / A';
                // })
                ->addColumn('action', function ($row) {
                    return view('delivery_charges.action', ['row' => $row]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $categories = Catergory::all();
        return view('delivery_charges.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'delivery_method' => 'required|string|max:255',
            'category_id' => 'required|integer|max:255',
            'amount' => 'required',
            'time_duration' => 'required|string|max:255',
            'grace_period' => 'required|string|max:255',
            'charge_at_beginning' => 'required'
        ]);

        DeliveyCharges::create($request->all());
        return redirect()->route('delivery-charges.index')
            ->with('success', 'Delivery Charge created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveyCharges  $deliveyCharges
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveyCharges $deliveyCharges)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveyCharges  $deliveyCharges
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveyCharges $delivey_charges)
    {
        $categories = Catergory::all();
        dd($delivey_charges->toArray());
        return view('delivery_charges.index', ['categories' => $categories, 'delivey_charges' => $delivey_charges]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveyCharges  $deliveyCharges
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveyCharges $deliveyCharges)
    {
        $request->validate([
            'delivery_method' => 'required|string|max:255',
            'category_id' => 'required|integer|max:255',
            'amount' => 'required',
            'time_duration' => 'required|string|max:255',
            'grace_period' => 'required|string|max:255',
            'charge_at_beginning' => 'required'
        ]);

        $deliveyCharges->update($request->all());

        return redirect()->route('delivery-charges.index')
            ->with('success', 'Delivery Charge updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveyCharges  $deliveyCharges
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveyCharges $deliveyCharges)
    {
        try {
            return $deliveyCharges->delete();
        } catch (QueryException $e) {
            print_r($e->errorInfo);
        }
    }
}
