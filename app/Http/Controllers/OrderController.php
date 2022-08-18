<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
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
            $data = Order::with(['customer.user', 'order_products'])->latest('updated_at')->get();
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
            'full_name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'zip_code' => 'required|string',
            'shipping_address' => 'required|string',
        ]);
        // $order->delivery_method = $request->delivery_method;
        $order->shipping_address = $request->shipping_address;
        $order->full_name = $request->full_name;
        $order->phone_number = $request->phone_number;
        $order->email = $request->email;
        $order->city = $request->city;
        $order->country = $request->country;
        $order->zip_code = $request->zip_code;
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
        $order = Order::where('id', $id)->with(['customer', 'order_products.product.category', 'product_commissions'])->first();
        $total_price = OrderProduct::where('order_id', $id)->sum('total_price');
        return view('orders.order_details', ['order' => $order, 'total_price' => $total_price]);
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
