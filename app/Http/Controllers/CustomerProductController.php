<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerProduct;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCommission;
use App\Models\ShopCart;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class CustomerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CustomerProduct::with(['product', 'customer'])->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('purchase_price', function ($row) {
                    return $row->purchase_price . ' USD';
                })
                // ->rawColumns()
                ->make(true);
        }
        return view('customer_products.index');
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
        // dd($request->cart_ids);
        $request->validate([
            'cart_ids' => ['required'],
            'user_id' => ['required'],
            // 'purchase_price' => ['required'],
            // 'quantity' => ['required'],
            // 'referral_code' => ['required', 'string', 'min:6', 'max:6'],
        ]);

        // dd($request->all());
        foreach ($request->cart_ids as $key => $cart) {
            $user_cart = ShopCart::find($cart);
            // dd($user_cart->toArray());
            $tier_1 = null;
            $tier_2 = null;
            $tier_3 = null;
            $tier_4 = null;
            $tier_5 = null;

            $user = User::find($request->user_id);
            if ($user->is_verified == 1) {
                $customer = Customer::where('user_id', $request->user_id)->first();
                $product = Product::where('id', $user_cart->product_id)->with('category')->first();
                $result = $product->productsInventory($user_cart->quantity);

                if ($result != null) {
                    if ($product->getProductCommission() != null) {
                        $tier_5_commission = ($product->getProductCommission() / 100) * $product->tier_commission_5;
                        if ($product->surcharge_at_product == 'no') {
                            $input_product_commission = [
                                'customer_id' => $customer->id,
                                'product_id' => $user_cart->product_id,
                                'product_price' => $product->getProductPrice(),
                                'product_mark_up' => $product->category->mark_up,
                                'tier_type' => 'tier_5',
                                // 'tier_id' => $tier_4->id,
                                'tier_commission' => $tier_5_commission,
                                'tier_commission_percentage' => $product->tier_commission_5,
                            ];
                        } else {
                            $input_product_commission = [
                                'customer_id' => $customer->id,
                                'product_id' => $user_cart->product_id,
                                'product_price' => $product->getProductPrice(),
                                'product_mark_up' => $product->mark_up,
                                'tier_type' => 'tier_5',
                                // 'tier_id' => $tier_4->id,
                                'tier_commission' => $tier_5_commission,
                                'tier_commission_percentage' => $product->tier_commission_5,
                            ];
                        }
                        ProductCommission::create($input_product_commission);
                        if ($user->referred_by != null) {

                            $tier_4 = User::where('referral_code', $user->referred_by)->first();

                            if ($tier_4 != null) {
                                $tier_4_commission = ($product->getProductCommission() / 100) * $product->tier_commission_4;
                                if ($product->surcharge_at_product == 'no') {
                                    $input_product_commission = [
                                        'customer_id' => $customer->id,
                                        'product_id' => $user_cart->product_id,
                                        'product_price' => $product->getProductPrice(),
                                        'product_mark_up' => $product->category->mark_up,
                                        'tier_type' => 'tier_4',
                                        'tier_id' => $tier_4->id,
                                        'tier_commission' => $tier_4_commission,
                                        'tier_commission_percentage' => $product->tier_commission_4,
                                    ];
                                } else {
                                    $input_product_commission = [
                                        'customer_id' => $customer->id,
                                        'product_id' => $user_cart->product_id,
                                        'product_price' => $product->getProductPrice(),
                                        'product_mark_up' => $product->mark_up,
                                        'tier_type' => 'tier_4',
                                        'tier_id' => $tier_4->id,
                                        'tier_commission' => $tier_4_commission,
                                        'tier_commission_percentage' => $product->tier_commission_4,
                                    ];
                                }
                                ProductCommission::create($input_product_commission);
                            }
                            if ($tier_4->referred_by != null) {
                                $tier_3 = User::where('referral_code', $tier_4->referred_by)->first();
                                if ($tier_3 != null) {
                                    $tier_3_commission = ($product->getProductCommission() / 100) * $product->tier_commission_3;
                                    if ($product->surcharge_at_product == 'no') {
                                        $input_product_commission = [
                                            'customer_id' => $customer->id,
                                            'product_id' => $user_cart->product_id,
                                            'product_price' => $product->getProductPrice(),
                                            'product_mark_up' => $product->category->mark_up,
                                            'tier_type' => 'tier_3',
                                            'tier_id' => $tier_3->id,
                                            'tier_commission' => $tier_3_commission,
                                            'tier_commission_percentage' => $product->tier_commission_3,
                                        ];
                                    } else {
                                        $input_product_commission = [
                                            'customer_id' => $customer->id,
                                            'product_id' => $user_cart->product_id,
                                            'product_price' => $product->getProductPrice(),
                                            'product_mark_up' => $product->mark_up,
                                            'tier_type' => 'tier_3',
                                            'tier_id' => $tier_3->id,
                                            'tier_commission' => $tier_3_commission,
                                            'tier_commission_percentage' => $product->tier_commission_3,
                                        ];
                                    }
                                    ProductCommission::create($input_product_commission);
                                }
                                // dd($tier_3->referred_by);
                                if ($tier_3->referred_by != null) {
                                    $tier_2 = User::where('referral_code', $tier_3->referred_by)->first();

                                    if ($tier_2 != null) {
                                        $tier_2_commission = ($product->getProductCommission() / 100) * $product->tier_commission_2;
                                        if ($product->surcharge_at_product == 'no') {
                                            $input_product_commission = [
                                                'customer_id' => $customer->id,
                                                'product_id' => $user_cart->product_id,
                                                'product_price' => $product->getProductPrice(),
                                                'product_mark_up' => $product->category->mark_up,
                                                'tier_type' => 'tier_2',
                                                'tier_id' => $tier_2->id,
                                                'tier_commission' => $tier_2_commission,
                                                'tier_commission_percentage' => $product->tier_commission_2,
                                            ];
                                        } else {
                                            $input_product_commission = [
                                                'customer_id' => $customer->id,
                                                'product_id' => $user_cart->product_id,
                                                'product_price' => $product->getProductPrice(),
                                                'product_mark_up' => $product->mark_up,
                                                'tier_type' => 'tier_2',
                                                'tier_id' => $tier_2->id,
                                                'tier_commission' => $tier_2_commission,
                                                'tier_commission_percentage' => $product->tier_commission_2,
                                            ];
                                        }
                                        ProductCommission::create($input_product_commission);
                                    }
                                    if ($tier_2->referred_by != null) {
                                        $tier_1 = User::where('referral_code', $tier_2->referred_by)->first();
                                        if ($tier_1 != null) {
                                            $tier_1_commission = ($product->getProductCommission() / 100) * $product->tier_commission_1;
                                            if ($product->surcharge_at_product == 'no') {
                                                $input_product_commission = [
                                                    'customer_id' => $customer->id,
                                                    'product_id' => $user_cart->product_id,
                                                    'product_price' => $product->getProductPrice(),
                                                    'product_mark_up' => $product->category->mark_up,
                                                    'tier_type' => 'tier_1',
                                                    'tier_id' => $tier_1->id,
                                                    'tier_commission' => $tier_1_commission,
                                                    'tier_commission_percentage' => $product->tier_commission_1,
                                                ];
                                            } else {
                                                $input_product_commission = [
                                                    'customer_id' => $customer->id,
                                                    'product_id' => $user_cart->product_id,
                                                    'product_price' => $product->getProductPrice(),
                                                    'product_mark_up' => $product->mark_up,
                                                    'tier_type' => 'tier_1',
                                                    'tier_id' => $tier_1->id,
                                                    'tier_commission' => $tier_1_commission,
                                                    'tier_commission_percentage' => $product->tier_commission_1,
                                                ];
                                            }
                                            ProductCommission::create($input_product_commission);
                                        }
                                    }
                                }
                            }
                        }
                    }

                    $input = $user_cart->toArray();
                    $input['customer_id'] = $customer->id;
                    CustomerProduct::create($input);
                    // dd($input);
                    if ($product->surcharge_at_product == 'no') {
                        $order = Order::create([
                            'customer_id' => $customer->id,
                            'product_id' => $product->id,
                            'spot_price' => $product->getProductPrice($type = 'number'),
                            'mark_up' => $product->category->mark_up,
                            'quantity' => $user_cart->quantity
                        ]);
                    } else {
                        $order = Order::create([
                            'customer_id' => $customer->id,
                            'product_id' => $product->id,
                            'spot_price' => $product->getProductPrice($type = 'number'),
                            'mark_up' => $product->mark_up,
                            'quantity' => $user_cart->quantity
                        ]);
                    }
                    Inventory::create([
                        'product_id' => $product->id,
                        'order_id' => $order->id,
                        'units' => -1 * abs($user_cart->quantity)
                    ]);
                } else {
                    return back()->with('error', 'Product not Available');
                }
            } else {
                return back()->with('error', 'User not verified');
            }
        }
        return back()->with('success', 'Purchased the item');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerProduct  $customerProduct
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerProduct $customerProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerProduct  $customerProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerProduct $customerProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerProduct  $customerProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerProduct $customerProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerProduct  $customerProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerProduct $customerProduct)
    {
        //
    }

    public function customer_products($id)
    {
        return view('customer_products.single_customer_product', ['customerID' => $id]);
    }

    public function customer_products_ajax($id)
    {
        $data = CustomerProduct::with(['product', 'customer'])->whereHas('customer', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('purchase_price', function ($row) {
                return $row->purchase_price . ' USD';
            })
            // ->rawColumns(['customer_name'])
            ->make(true);
    }
}
