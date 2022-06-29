<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerProduct;
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
        $tier_1_id = null;
        $tier_2_id = null;
        $tier_3_id = null;
        $user = User::find($request->user_id);
        if ($user->referred_by != null) {
            $tier_3 = User::where('referral_code', $user->referred_by)->first();
            $tier_3_id = $tier_3->id;
            if ($tier_3->referred_by != null) {
                $tier_2 = User::where('referral_code', $tier_3->referred_by)->first();
                $tier_2_id = $tier_2->id;
                if ($tier_2->referred_by != null) {
                    $tier_1 = User::where('referral_code', $tier_2->referred_by)->first();
                    $tier_1_id = $tier_1->id;
                }
            }
        }

        // dd($tier_3->toArray());
        $customer = Customer::where('user_id', $request->user_id)->first();
        $product = Product::find($request->product_id);

        $input_product_commission = [
            'customer_id' => $customer->id,
            'product_id' => $request->product_id,
            'tier_1_id' => $tier_1_id,
            'tier_2_id' => $tier_2_id,
            'tier_3_id' => $tier_3_id,
            'tier_1_price' => $product->tier_commission_1,
            'tier_2_price' => $product->tier_commission_2,
            'tier_3_price' => $product->tier_commission_3,
        ];
        // dd($input_product_commission);
        ProductCommission::create($input_product_commission);

        $input = $request->all();
        $input['customer_id'] = $customer->id;
        CustomerProduct::create($input);
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
