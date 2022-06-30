<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerProduct;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCommission;
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
                ->addColumn('customer_name', function ($row) {
                    return $row->customer->first_name . ' ' . $row->customer->last_name;
                })
                ->rawColumns(['customer_name'])
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
        // dd($request->all());
        $request->validate([
            'user_id' => ['required'],
            'product_id' => ['required'],
            'purchase_price' => ['required'],
            'referral_code' => ['required', 'string', 'min:6', 'max:6'],
        ]);

        $tier_1 = null;
        $tier_2 = null;
        $tier_3 = null;

        $customer = Customer::where('user_id', $request->user_id)->first();
        $product = Product::find($request->product_id);
        $user = User::find($request->user_id);

        if ($product->getProductCommission() != null) {
            if ($user->referred_by != null) {
                $tier_3 = User::where('referral_code', $user->referred_by)->first();
                if ($tier_3 != null) {
                    $tier_3_commission = ($product->getProductCommission() / 100) * $product->tier_commission_3;
                    $input_product_commission = [
                        'customer_id' => $customer->id,
                        'product_id' => $request->product_id,
                        'tier_type' => 'tier_3',
                        'tier_id' => $tier_3->id,
                        'tier_commission' => $tier_3_commission,
                    ];

                    ProductCommission::create($input_product_commission);
                }
                if ($tier_3->referred_by != null) {
                    $tier_2 = User::where('referral_code', $tier_3->referred_by)->first();
                    if ($tier_2 != null) {
                        $tier_2_commission = ($product->getProductCommission() / 100) * $product->tier_commission_2;
                        $input_product_commission = [
                            'customer_id' => $customer->id,
                            'product_id' => $request->product_id,
                            'tier_type' => 'tier_2',
                            'tier_id' => $tier_2->id,
                            'tier_commission' => $tier_2_commission,
                        ];
                        ProductCommission::create($input_product_commission);
                    }
                    // dd($tier_3->referred_by);
                    if ($tier_2->referred_by != null) {
                        $tier_1 = User::where('referral_code', $tier_2->referred_by)->first();

                        if ($tier_1 != null) {
                            $tier_1_commission = ($product->getProductCommission() / 100) * $product->tier_commission_1;
                            $input_product_commission = [
                                'customer_id' => $customer->id,
                                'product_id' => $request->product_id,
                                'tier_type' => 'tier_1',
                                'tier_id' => $tier_1->id,
                                'tier_commission' => $tier_1_commission,
                            ];
                            ProductCommission::create($input_product_commission);
                        }
                    }
                }
            }
        }

        $input = $request->all();
        $input['customer_id'] = $customer->id;
        CustomerProduct::create($input);
        Order::create([
            'customer_id' => $customer->id,
            'product_id' => $product->id,
            'spot_price' => $product->getProductPrice($type = 'number'),
            'mark_up' => $product->mark_up
        ]);
        return back();
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
            ->addColumn('customer_name', function ($row) {
                return $row->customer->first_name . ' ' . $row->customer->last_name;
            })
            ->rawColumns(['customer_name'])
            ->make(true);
    }
}
