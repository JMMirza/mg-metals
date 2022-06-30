<?php

namespace App\Http\Controllers;

use App\Models\ProductCommission;
use Illuminate\Http\Request;
use DataTables;

class ProductCommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ProductCommission::with(['product', 'customer'])->get();
            return Datatables::of($data)
                // ->addIndexColumn()
                // ->rawColumns()
                ->make(true);
        }
        return view('product_commission.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCommission  $productCommission
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCommission $productCommission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCommission  $productCommission
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCommission $productCommission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCommission  $productCommission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCommission $productCommission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCommission  $productCommission
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCommission $productCommission)
    {
        //
    }
}
