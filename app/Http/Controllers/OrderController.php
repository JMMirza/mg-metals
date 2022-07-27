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
            $data = Order::with(['customer.user'])->latest()->get();
            return Datatables::of($data)
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
        // dd($request->all());
        $request->validate([
            'delivery_method' => 'required|string|max:255',
            'shipping_address' => 'required|string|max:255',
        ]);
        $order->delivery_method = $request->delivery_method;
        $order->shipping_address = $request->shipping_address;
        $order->save();
        return redirect(route('home'))->with('success', 'order placed successfully');
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
        $order = Order::where('id', $id)->with(['customer', 'order_products.product.category'])->first();
        // dd($order->order_products[0]);
        return view('orders.order_details', ['order' => $order]);
    }

    public function order_delivery_details($id)
    {
        $order = Order::where('id', $id)->with(['customer.user'])->first();
        // dd($order->toArray());
        if ($order) {
            return view('frontend.shop_cart.delievery_method', ['order' => $order]);
        }
        return back()->with('error', 'No Order Found');
    }
}
