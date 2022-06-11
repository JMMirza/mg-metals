<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Database\QueryException;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Customer::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('customers.actions', ['row' => $row]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('customers.customers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.add_new_customer');
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'user_id' => 'required|integer|max:255',
            'phone_number' => 'required|digits:10',
            'nationality' => 'required|string|max:255',
            'passport_no' => 'string|min:10|max:255',
            'bank_account_name' => 'required|max:255',
            'bank_account_number' => 'string|max:255',
            'bank_name' => 'string|max:255',
            'bank_branch_number' => 'string|max:255',
            'bank_country_name' => 'string|max:255',
            'bank_swift_code' => 'integer|min:4|max:255',
            'sales_rep_name' => 'string|max:255',
            'sales_rep_number' => 'digits:10',
            'sales_rep_country' => 'string|max:255',
            'strorage_service' => 'boolean'
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.customers', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'user_id' => 'required|integer|max:255',
            'phone_number' => 'required|digits:10',
            'nationality' => 'required|string|max:255',
            'passport_no' => 'string|min:10|max:255',
            'bank_account_name' => 'required|max:255',
            'bank_account_number' => 'string|max:255',
            'bank_name' => 'string|max:255',
            'bank_branch_number' => 'string|max:255',
            'bank_country_name' => 'string|max:255',
            'bank_swift_code' => 'integer|min:4|max:255',
            'sales_rep_name' => 'string|max:255',
            'sales_rep_number' => 'digits:10',
            'sales_rep_country' => 'string|max:255',
            'strorage_service' => 'boolean'
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        try {
            return $customer->delete();
        } catch (QueryException $e) {
            print_r($e->errorInfo);
        }
    }
}
