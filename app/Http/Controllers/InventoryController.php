<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Database\QueryException;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Inventory::with(['product', 'order'])->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('product_price', function ($row) {
                    return $row->product->getProductPrice();
                })
                ->addColumn('action', function ($row) {
                    return view('inventory.action', ['row' => $row]);
                })
                ->rawColumns(['action', 'parent_id'])
                ->make(true);
        }
        // dd($agents->toArray());
        $products = Product::where('status', 'active')->get();
        return view('inventory.inventory', ['products' => $products]);
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
            'product_id' => 'required|integer|max:255',
            'units' => 'required|integer|max:255'
        ]);

        Inventory::create($request->all());

        return redirect()->route('inventories.index')
            ->with('success', 'Inventory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        $products = Product::where('status', 'active')->get();
        return view('inventory.inventory', ['products' => $products, 'inventory' => $inventory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'product_id' => 'required|integer|max:255',
            'units' => 'required|integer|max:255'
        ]);

        $inventory->update($request->all());

        return redirect()->route('inventories.index')
            ->with('success', 'Inventory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        try {
            return $inventory->delete();
        } catch (QueryException $e) {
            print_r($e->errorInfo);
        }
    }
}
