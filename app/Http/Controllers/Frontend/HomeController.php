<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catergory;

class HomeController extends Controller
{
    public function index()
    {   
        return view('frontend.home.index');
    }

    public function shop(Request $request)
    {   
        $_products = Product::with('category');

        if($request->has('category')) {
            $_products = $_products->where(['catergory_id' => $request->category]);
        }

        $products = $_products->paginate(12);
        $categories = Catergory::all();

        return view('frontend.products.index', [
            'products' => $products,
            'categories' => $categories,
            // 'results_count' => $_products->count(),
            // 'total_count' => Product::with('category')->count(),
        ]);
    }
}
