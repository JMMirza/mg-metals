<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catergory;
use App\Models\Customer;
use App\Models\Manufacturer;
use App\Models\User;
use App\Models\CustomerShareholder;
use App\Models\AuthorizedTradingRepresentative;
use App\Models\Order;
use App\Models\ProductCommission;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator as ValidationValidator;

class HomeController extends Controller
{
    public function index()
    {
        $_products = Product::with('category');
        $products = $_products->limit(3)->latest()->get();

        return view('frontend.home.index', [
            'products' => $products,
        ]);
    }

    public function shop(Request $request)
    {
        $_products = Product::with('category');

        if ($request->has('category')) {

            $category = Catergory::where('id', $request->category)->with(['children']);

            // dd($category);

            $_products = $_products->where(['catergory_id' => $request->category]);
        }

        $products = $_products->paginate(12);
        $categories = Catergory::whereNull('parent_id')->with(['children'])->get();
        $manufacturers = Manufacturer::all();


        return view('frontend.products.index', [
            'products' => $products,
            'categories' => $categories,
            'manufacturers' => $manufacturers,
            'best_sellers' =>  Product::with('category')->limit(10)->latest()->get(),
            // 'results_count' => $_products->count(),
            // 'total_count' => Product::with('category')->count(),
        ]);
    }

    public function about_us()
    {
        return view('frontend.about_us.index');
    }

    public function services()
    {
        return view('frontend.services.index');
    }

    public function contact_us()
    {
        return view('frontend.contact_us.index');
    }

    public function login()
    {
        return view('frontend.login.login');
    }

    public function register()
    {
        return view('frontend.register.register');
    }

    public function login_customer(Request $request)
    {
        $request->validate([
            'login_email' => ['required', 'string', 'email', 'max:255'],
            'login_password' => ['required', 'string', 'min:8'],
        ]);

        $email = $request->login_email;
        $password = $request->login_password;

        $user = User::where('email', '=', $email)->first();
        if (!$user) {
            $validator = Validator::make([], []); // Empty data and rules fields
            $validator->errors()->add('login_email', 'The auth credentials are not matched');
            throw new ValidationException($validator);
            // return response()->json(['success' => false, 'message' => 'Login Fail, please check email id']);
        }
        if (!Hash::check($password, $user->password)) {
            $validator = Validator::make([], []); // Empty data and rules fields
            $validator->errors()->add('login_email', 'The auth credentials are not matched');
            throw new ValidationException($validator);
            // return response()->json(['success' => false, 'message' => 'Login Fail, pls check password']);
        }
        auth()->login($user);
        return redirect()->route('home');
    }

    public function register_account(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'referred_by' => ['required', 'string', 'min:6', 'max:6'],
            'customer_type' => ['required']
        ]);


        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'customer_type' => $request->customer_type,
        ];

        if($request->has('referral_code')){

            $agent = User::where('referral_code', $request->referred_by)->first();

            $referral_code = strtoupper(Str::random(6));

            if ($agent) {
                $input['referred_by'] = $request->referred_by;
                $input['referral_code'] = $referral_code;
            } else {
                $input['referred_by'] = null;
                $input['referral_code'] = $referral_code;
            }
        }

        // return back()->withErrors('Referral code not found');
        $user = User::create($input);
        auth()->login($user);
        return redirect(route('customer_profile'))
            ->with('success', 'Account created successfully.');
    }

    public function profile()
    {
        $user = \Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();


        if ($customer == null) {
            $customer = Customer::create([
                'user_id' => $user->id,
                'full_name' => $user->name,
                'gender' => '',
                'occupation' => '',
                'passport_no' => '',
                'phone_number' => '',
                'nationality' => '',
                'address' => '',
            ]);
        }

        $shareholders = CustomerShareholder::with('customer')->where('customer_id', $customer->id)->latest()->get();
        $representatives = AuthorizedTradingRepresentative::with('customer')->where('customer_id', $customer->id)->latest()->get();

        return view('frontend.profile.profile', ['shareholders' => $shareholders, 'representatives' => $representatives, 'customer' => $customer]);
    }

    public function switch_language($locale)
    {
        // echo($locale);
        if (!in_array($locale, ['en', 'ch', 'ch_simple'])) {
            abort(400);
        }

        App::setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }

    public function single_product($id)
    {
        $product = Product::where(['id' => $id])->with(['category', 'manufacturer'])->first();
        // dd($product->toArray());
        return view('frontend.single_product.index', compact('product'));
    }

    public function applicant_information_individual(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_id' => 'required|unique:customers',
            'full_name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'passport_no' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'address' => 'required',
        ]);

        $customer = Customer::create($request->all());
        return redirect(route('customer_profile' . '?tab=corporate', compact('customer')))
            ->with('success', 'Account created successfully.');
    }

    public function applicant_information_corporate(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
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
            'import' => 'required|boolean',
            'countries_of_import' => 'required|boolean',
            'business_address' => 'required',
        ]);

        $customer = Customer::find($request->customer_id);
        $customer->update($request->all());
        return view('frontend.profile.profile', compact('customer'));
    }

    public function customer_orders()
    {
        $user = \Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();
        if ($customer) {
            $orders = Order::where('customer_id', $customer->id)->with(['product'])->get();
            // dd($orders->toArray());
            return view('frontend.orders.index', ['orders' => $orders]);
        }
        return view('frontend.orders.index');
    }

    public function customer_commissions()
    {
        $user = \Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();
        if ($customer) {
            $commissions = ProductCommission::where('customer_id', $customer->id)->with(['product'])->get();
            // dd($commissions->toArray());
            return view('frontend.customer_commissions.index', ['commissions' => $commissions]);
        }
        return view('frontend.customer_commissions.index');
    }
}
