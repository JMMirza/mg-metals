<?php

namespace App\Http\Controllers;

use App\Models\ShopCart;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ShopCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $cart = ShopCart::where('user_id', $user->id)->latest()->get();
        $total_price = 0;
        foreach ($cart as $key => $value) {
            $total_price = $value->total_price + $total_price;
        }
        // dd($cart->toArray());
        return view('frontend.shop_cart.index', ['carts' => $cart, 'total_price' => $total_price]);
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
            'user_id' => ['required'],
            'product_id' => ['required'],
            'spot_price' => ['required'],
            'quantity' => ['required'],
            // 'referral_code' => ['required', 'string', 'min:6', 'max:6'],
        ]);
        $input = $request->all();
        $input['total_price'] = $request->quantity * $request->spot_price;
        ShopCart::create($input);
        return back()->with('success', 'Item Added to Cart Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopCart  $shopCart
     * @return \Illuminate\Http\Response
     */
    public function show(ShopCart $shopCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopCart  $shopCart
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopCart $shopCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShopCart  $shopCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopCart $shopCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopCart  $shopCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopCart $shopCart)
    {
        try {
            // dd($shopCart);
            return $shopCart->delete();
        } catch (QueryException $e) {
            print_r($e->errorInfo);
        }
    }
}
