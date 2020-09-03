<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\ProductVariantPrice;
use App\Models\Variant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Imagep;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        // make a list view of products
        $products = Product::with(['product_variants', 'variants_price'])->get();
        return view('products.index',[
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $variants = Variant::all();
        return view('products.create', compact('variants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        dd($request->all(), $request->file('product_image'));
        // // Product Insert
        // $product_id = Product::insertGetId([
        //     'title' => $request->input('title'),
        //     'sku' => $request->input('sku'),
        //     'description' => $request->input('description'),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(), // if need
        // ]);

        // // Insert into Product varient
        // foreach ($request->product_variant as $singel_variant) {
        //     # code...
        // }
        // ProductVariant::insert([
        //     'variant_id' => Variant::find($singel_variant['option'])->id,
        //     'variant' => Variant::find($singel_variant['option'])->title,
        //     'product_id' => $product_id,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(), // if need
        // ]);



        // // Image Upload
        // $file_name = $request->product_image;
        // if($file_name){
        //     $position = strpos($file_name);
        //     $sub = substr($file_name, 0, $position);
        //     $file_ext = explode('/', $sub)[1];
        //     $name = time().'.'.$file_ext;
        //     $img = Image::make($file_name)->resize(480,400);
        //     $upload_path = 'photos/product';
        //     $image_url = $upload_path.$name;
        //     $img->save($image_url);

        //     ProductImage::insert([
        //         'product_id' => $product_id,
        //         'file_path' => $image_url,
        //         'thumbnail' => $img,
        //     ]);
        // }

        // return response()->json([
        //     'type' => 'Stored',
        //     'message' => 'Data stored',
        // ],200);
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $variants = Variant::all();
        return view('products.edit', compact('variants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
       
        // // Product Insert
        // $product->update([
        //     'title' => $request->input('title'),
        //     'sku' => $request->input('sku'),
        //     'description' => $request->input('description'),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(), // if need
        // ]);

        // // Insert into Product varient
        // foreach ($request->product_variant as $singel_variant) {
            
        // }
        // $product_variant = ProductVariant::where('product_id', $product->id)->first();
        // $product_variant->update([
        //     'variant_id' => Variant::find($singel_variant['option'])->id,
        //     'variant' => Variant::find($singel_variant['option'])->title,
        //     'product_id' => $product->id,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(), // if need
        // ]);



        // // Image Upload
        // $file_name = $request->product_image;

        // if($file_name){
        //     if(
        //         // delete old image and 
        //     )
        //     //then upload new image
            
        //     $position = strpos($file_name);
        //     $sub = substr($file_name, 0, $position);
        //     $file_ext = explode('/', $sub)[1];
        //     $name = time().'.'.$file_ext;
        //     $img = Image::make($file_name)->resize(480,400);
        //     $upload_path = 'photos/product';
        //     $image_url = $upload_path.$name;
        //     $img->save($image_url);

        //     $product_image = ProductImage::where('product_id', $product_id)->first();

        //     $product_image->update([
        //         'product_id' => $product->id,
        //         'file_path' => $image_url,
        //         'thumbnail' => $img,
        //     ]);
        // }

        // return response()->json([
        //     'type' => 'Stored',
        //     'message' => 'Data updated',
        // ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        
        // delete in other variant

        // unlink image

        // also price table

        return response()->json([
            'type' => 'Stored',
            'message' => 'Product Deleted',
        ],200);
    }
}
