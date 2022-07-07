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

        // dd($this->get_similar_products());
        if ($request->ajax()) {

            $data = $this->get_similar_products();
            // Inventory::with(['product', 'order'])->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('inventory.action', ['row' => $row]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // dd($agents->toArray());
        return view('inventory.inventory');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('status', 'active')->get();
        return view('inventory.add_new_inventory', ['products' => $products]);
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

    public function load_single_product_logs($id)
    {
        $product_id = $id;
        $inventories = Inventory::with(['product', 'order.customer'])->where('product_id', $product_id)->latest()->get();
        // dd($inventories->toArray());
        return view('inventory.single_product_log', ['inventories' => $inventories]);
    }

    private function get_similar_products()
    {
        $products = Product::where('status', 'active')->get();
        $inventories = [];
        foreach ($products as  $product) {
            $get_prod_units = Inventory::where('product_id', $product->id)->sum('units');
            // dd($get_prod_units);
            array_push($inventories, [
                'id' => $product->id,
                'product_name' => $product->name,
                'units' => $get_prod_units
            ]);
        }
        return $inventories;
    }
}
