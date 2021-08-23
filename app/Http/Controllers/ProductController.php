<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

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

        $products = Product::orderByDesc('created_at')->paginate($pagination);
        return view('productsView')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productsFormView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request);
        // die;
        $data = $request->all();
        $product = new Product();

        $product->name = $data['name'];
        $product->brand_id = 1;
        $product->weight = $data['weight'];
        $product->price = $data['price'];
        $product->discount = $data['discount'];
        $product->category_id = 1;
        $product->description = $data['description'];

        $product->save();
        $Product_Id = Product::pluck('id')->last();

        // upload multi image
        if ($request->hasFile('product_images')) {

            $image_array = $request->file('product_images');

            $array_len = count($image_array);

            for ($i = 0; $i < $array_len; $i++) {
                $image_ext = $image_array[$i]->getClientOriginalExtension();
                $filename = rand(111, 99999) . "." . $image_ext;
                $folder = '/img/products/';
                $destinationPath = public_path($folder);
                $filePath = $folder . $filename;
                $image_array[$i]->move($destinationPath, $filename);

                $images = new ProductImage();
                $images->image_url = $filePath;
                $images->product_id = $Product_Id;
                $images->save();
            }
        } else {
            $images = new ProductImage();
            $images->ImageName = "/img/products/noimage.png";
            $images->product_id = $Product_Id;
            $images->save();
        }

        return redirect('product')->with('flash_message_success', 'Product added successfully!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
