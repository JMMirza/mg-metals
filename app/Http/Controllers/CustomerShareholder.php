<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerShareholder as ModelsCustomerShareholder;
use Illuminate\Http\Request;
use DataTables;

class CustomerShareholder extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // dd($request->all());
            $data = ModelsCustomerShareholder::with('customer')->where('customer_id', $request->customer_id)->get();
            // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                // ->addColumn('parent_id', function ($row) {
                //     if ($row->parent_id != null)
                //         return $row->parent_id;
                //     else
                //         return 'N / A';
                // })
                // ->addColumn('action', function ($row) {
                //     return view('agents.action', ['row' => $row]);
                // })
                // ->rawColumns(
                //     // ['action', 'parent_id']
                // )
                ->make(true);
        }
        $customer = Customer::find($request->customer_id);
        return view('frontend.profile.profile', compact('customer'));
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
        $request->validate([
            'name' => 'required',
            'customer_id' => 'required',
            'title' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'passport_no' => 'required',
            'nationality' => 'required',
            'address' => 'required'
        ]);
        // dd($request->all());
        ModelsCustomerShareholder::create($request->all());

        return redirect(route('customer-profile-data.edit', $request->customer_id) . '?tab=shareholder')
            ->with('success', 'Account created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
