<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 10;
        $products = Product::latest()->paginate($pagination);
        return view('productsView', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $images[] = new ProductImage();
        $action = URL::route('products.store');
        $categories = Category::all();
        $brands = Brand::all();
        return view('productsFormView', compact('product', 'action', 'images', 'categories','brands'));
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
            'name' => 'required',
            'brand_id' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);
        $product = Product::create($request->all());

        // // upload multi image
        if ($request->hasfile('image_url')) {
            $images = new ProductImage();
            $images = $request->file('image_url');
            foreach ($images as $image) {
                $image_ext = $image->getClientOriginalExtension();
                $filename = rand(111, 99999) . "." . $image_ext;
                $folder = '/img/products/';
                $filePath = $folder . $filename;
                $array[] = ['image_url' => $filePath];
                $image->move(public_path($folder), $filename);
            }
            $product->productImages()->createMany($array);
        }
        return redirect()->route('products.index')->with('flash_message_success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('productsDetailsView', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $action = URL::route('products.update', $product->id);
        $categories = Category::all();
        $brands = Brand::all();

        return view('productsFormView', compact('product', 'action', 'categories','brands'));
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
        $request->validate([
            'name' => 'required',
            'brand_id' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        // echo "<pre>"; print_r($request->all()); die;

        $product->update($request->all());
        return redirect()->route('products.index')->with('flash_message_success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $images = $product->productImages()->get();
        foreach ($images as $image) {
            if (file_exists(public_path() . $image->image_url)) {
                unlink(public_path() . $image->image_url);
            }
        }
        $product->productImages()->delete();
        $product->delete();

        return redirect()->route('products.index')
            ->with('flash_message_success', 'Product deleted successfully');
    }
}
