<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catergory;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\App;

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

        if($request->has('category')) {

            $category = Catergory::where('id', $request->category)->with(['children']);

            dd($category);

            $_products = $_products->where(['catergory_id' => $request->category]);
        }

        $products = $_products->paginate(12);
        $categories = Catergory::whereNull('parent_id')->with(['children'])->get();
        $manufacturers = Manufacturer::all();
        

        return view('frontend.products.index', [
            'products' => $products,
            'categories' => $categories,
            'manufacturers' => $manufacturers
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

    public function profile()
    {   
        return view('frontend.profile.profile');
    }

    public function switch_language($locale)
    {   
        // echo($locale);
        if (! in_array($locale, ['en', 'ch'])) {
            abort(400);
        }
     
        App::setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }


    
}
