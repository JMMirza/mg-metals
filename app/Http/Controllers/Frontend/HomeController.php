<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catergory;
use App\Models\Customer;
use App\Models\Manufacturer;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

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

    public function register_account(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        auth()->login($user);
        return redirect()->route('customer_profile?tab=individual')
            ->with('success', 'Account created successfully.');
    }

    public function profile()
    {
        $user = \Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();
        if ($customer)
            return view('frontend.profile.profile', compact('customer'));
        else
            return view('frontend.profile.profile');
    }

    public function switch_language($locale)
    {
        // echo($locale);
        if (!in_array($locale, ['en', 'ch'])) {
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
}
