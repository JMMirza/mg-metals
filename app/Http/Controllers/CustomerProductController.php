<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerProduct;
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
        $customer = Customer::where('user_id', $request->user_id)->first();
        // dd($customer);
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
