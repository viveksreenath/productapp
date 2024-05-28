<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        //
        $product = new Product;
        $products = $product->select(['id','title','description','variants','image'])->get();
        
        return view('Product.index')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = new Product; 
        $product->title = $request->title;
        $product->description = $request->description;
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
           ]);
           $product->image =  '';
        if($request->image){
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $fileName);
            $product->image =  $fileName;
        }
        $product->variants = [
            'size' => $request->size,'color' => $request->color
        ];
        $product->save(); 
        return redirect('/')->with('status', 'New Product Added to list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        //
        $productDetails = $product->find($id);
        return view('Product.view')->with(['product' => $productDetails]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        //
        $productDetails = $product->find($id);
        
        return view('Product.edit')->with(['product' => $productDetails]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $product = Product::find($request->id); 
        $product->title = $request->title;
        $product->description = $request->description;
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
           ]);
        if($request->image){
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $fileName);
            $product->image =  $fileName;
        }
        $product->variants = [
            'size' => $request->size,'color' => $request->color
        ];
        $product->save(); 
        return redirect('/view/'.$request->id)->with('status', 'Product details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        //
        Product::where('id', $id)->delete();
        return redirect('/');
    }
}