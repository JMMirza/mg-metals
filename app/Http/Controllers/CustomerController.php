<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

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

            $data = Customer::with('user')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('customers.actions', ['row' => $row]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $users = User::all();

        return view('customers.customers', ['users' => $users]);
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
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'customer_type' => ['required']
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'customer_type' => $request->customer_type
        ]);
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'passport_no' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'address' => 'required',
            'business_name' => 'required|string|max:255',
            'type_of_organization' => 'required|string|max:255',
            'business_phone_num' => 'required|string|max:255',
            'business_fax' => 'required|string|max:255',
            'business_email' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'zip_code' => 'required|string|max:255',
            'type_of_business' => 'required|string|max:255',
            'business_reg_num' => 'required|string|max:255',
            'country_of_incorporation' => 'required|string|max:255',
            'years_in_business' => 'required|string|max:255',
            'import' => 'required',
            // 'countries_of_import' => 'required',
            'business_address' => 'required',
            'hear_about_mg' => 'required|string|max:255',
            'sales_rep_name' => 'required|string|max:255',
            'sales_rep_number' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'bank_country_name' => 'required|string|max:255',
            'bank_account_name' => 'required|string|max:255',
            'bank_account_number' => 'required|string|max:255',
            'bank_branch_number' => 'required|string|max:255',
            'bank_swift_code' => 'required|string|max:255',
        ]);

        $input = $request->all();
        $input['user_id'] = $user->id;
        $input['full_name'] = $request->name;
        Customer::create($input);

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
        $user = User::find($customer->user_id);
        return view('customers.edit_customer', ['customer' => $customer, 'user' => $user]);
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
            'full_name' => 'required|string|max:255',
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
