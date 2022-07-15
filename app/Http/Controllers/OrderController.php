<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::with(['product', 'customer.user'])->latest()->get();
            return Datatables::of($data)
                ->addColumn('mark_up', function ($row) {
                    if ($row->product->mark_up) {
                        if ($row->product->markup_type == 'flat') {
                            return  $row->mark_up . ' USD';
                        } else {
                            return  $row->mark_up . ' %';
                        }
                    } else {
                        return 'N / A';
                    }
                })
                ->addColumn('spot_price', function ($row) {
                    return  $row->spot_price . ' USD';
                })
                ->addColumn('action', function ($row) {
                    return view('orders.actions', ['row' => $row]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('orders.index');
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.order_details');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function order_details($id)
    {
        $order = Order::where('id', $id)->with(['product', 'customer'])->first();
        // dd($order->toArray());
        return view('orders.order_details', ['order' => $order]);
    }
}
