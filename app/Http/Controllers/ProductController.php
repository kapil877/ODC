<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::latest()->paginate(5);

        return view('admin.product.product',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::select('id','categoryname')->get();

        return view('admin.product.create',compact('categories'));
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

            'productname' => 'required | max:255',
            'category' => 'required',
            'price' => 'required | integer',
            'tag' => 'required | max:140',
            'image' => 'required | mimes:jpg,png,jpeg | max:2048',
            'description' => 'required | max:255',
        ]);

        $fileName = $request->image->getClientOriginalName();
        $request->image->move(public_path().'/product_image', $fileName);

        Product::create([

            'product_category_id'=>$request->category,
            'name'=>$request->productname,
            'image'=>$fileName,
            'price'=>$request->price,
            'tag'=>$request->tag,
            'description'=>$request->description,
        ]);

        return redirect()->route('product.index')->with('success','Product Inserted');
   
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

        $categories = ProductCategory::select('id','categoryname')->get();

        return view('admin.product.edit',compact('product','categories'));
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

            'productname' => 'required | max:255',
            'category' => 'required',
            'price' => 'required | integer',
            'tag' => 'required | max:140',
            'image' => 'required | mimes:jpg,png,jpeg | max:2048',
            'description' => 'required | max:255',
        ]);

        $fileName = $request->image->getClientOriginalName();
        $request->image->move(public_path().'/product_image', $fileName);

        $product->where('id',$request->upid)->update([

            'product_category_id'=>$request->category,
            'name'=>$request->productname,
            'image'=>$fileName,
            'price'=>$request->price,
            'tag'=>$request->tag,
            'description'=>$request->description,
        ]);

        return redirect()->route('product.index')->with('success','Product Updated');
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
