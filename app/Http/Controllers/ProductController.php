<?php

namespace App\Http\Controllers;

use App\product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //authentication
    public function __Construct()
    {
        $this->middleware('auth')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=product::all();
        $category = Category::all();
        return view('welcome',['category'=>$category,'product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create',compact('categories',$categories));
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
            'name'=>'required|unique:products',
            'details'=>'required',
            'category_id'=>'required',
            'image'=>'required',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('uploaded_images'), $imageName);
        $attribute = array(
            'name'=>$request->input('name'),
            'details'=>$request->input('details'),
            'category_id'=>$request->input('category_id'),
            'image'=>$imageName,
        );
        product::create($attribute);

        return redirect()->route('product.index')->with('message','product saved ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        $productData=product::findOrfail($product->id);
        $category=Category::findOrfail($productData->category_id);
        $productData->category_id=$category->name;
        return view('product.show',compact('productData',$productData));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $product=product::findOrfail($product->id);
        return  view('product.edit',compact('product',$product));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $attribute=$request->validate([
            'name'=>'required|unique:products,name,'.$product->id,
            'detalis'=>'required',
        ]);

        $product->update($attribute);
        return redirect()->route('product.index')->with('message','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product=product::findOrfail($product->id);
        $product->delete();
        return redirect()->route('product.index')->with('message','Product deleted successfully');
    }
}
