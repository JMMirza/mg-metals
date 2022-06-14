<?php

namespace App\Http\Controllers;

use App\Models\Catergory;
use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;
use File;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Product::with('category')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('products.actions', ['row' => $row]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $categories = Catergory::all();
        return view('products.products', ['categories' => $categories]);
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
        $request->validate([
            'sku' => 'required|string|max:255||unique:products,sku',
            'name' => 'required|string|max:255',
            'product_picture' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'pricing_type' => 'required|string|max:255',
            'fixed_amount' => 'required',
            'promo_amount' => 'required',
            'mark_up' => 'required',
            'surcharge_at_product' => 'required',
            'catergory_id' => 'required|integer',
            'description' => 'required'
        ]);
        $input = $request->all();

        $file_name = time() . '.' . $request->product_picture->extension();
        $path = 'uploads/products';
        File::ensureDirectoryExists($path);

        $request->product_picture->move(public_path($path), $file_name);

        $input['product_picture'] = $file_name;
        Product::create($input);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Catergory::all();
        return view('products.products', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // dd($request->all());
        $request->validate([
            'sku' => 'required|string|max:255|unique:products,sku,' . $product->id,
            'name' => 'required|string|max:255',
            'product_picture' => 'required|file|mimes:jpg,jpeg,png',
            'pricing_type' => 'required|string|max:255',
            'fixed_amount' => 'required',
            'promo_amount' => 'required',
            'mark_up' => 'required',
            'surcharge_at_product' => 'required',
            'catergory_id' => 'required|integer',
            'description' => 'required'
        ]);

        $input = $request->all();

        $file_name = time() . '.' . $request->product_picture->extension();
        $path = 'uploads/products';
        File::ensureDirectoryExists($path);

        $request->product_picture->move(public_path($path), $file_name);

        $input['product_picture'] = $file_name;

        $product->update($input);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            return $product->delete();
        } catch (QueryException $e) {
            print_r($e->errorInfo);
        }
    }
}
