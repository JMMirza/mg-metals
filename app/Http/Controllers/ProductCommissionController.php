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
            $data = ProductCommission::with(['product', 'customer'])->latest()->get();
            // dd($data->toArray());
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('tier_commission', function ($row) {
                    // dd($row);
                    return  $row->tier_commission . ' USD';
                })
                ->addColumn('product_mark_up', function ($row) {
                    if (isset($row->product_mark_up)) {
                        if ($row->mark_up_type == 'flat') {
                            return  $row->product_mark_up . ' USD';
                        } else {
                            // dd('hello');
                            $row->product_price = (int)$row->product_price;
                            $markup = ($row->product_price / 100) * $row->product_mark_up;
                            return  $markup . ' USD';
                        }
                    } else {
                        return 'N / A';
                    }
                })
                ->addColumn('tier_commission_percentage', function ($row) {
                    if (isset($row->tier_commission_percentage)) {
                        return  $row->tier_commission_percentage . ' %';
                    } else {
                        return 'N / A';
                    }
                })
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
