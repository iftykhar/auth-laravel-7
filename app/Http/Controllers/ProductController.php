<?php

namespace App\Http\Controllers;

use App\product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

          $attributes = $request->validate([
            'category_id'=>'required',
            'name'=>'required|unique:products',
            'details'=>'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,gif,png|max:1024',
            'file' => 'nullable|file|mimes:docs,pdf|max:5000',
        ]);


        if ($request->hasFile('image')) {
            $imageName = "uploaded_images/".time().'.'.$request->image->extension();

            $request->image->move(public_path('uploaded_images'), $imageName);

            $attributes['image'] = $imageName;
        }
        else {
            $attributes['image'] = '';
        }

        if ($request->hasFile('file')){
            $fileName = "/" . time().'.'.$request->file->extension();

            $request->file->move(public_path('/'),$fileName);

            $attributes['file'] = $fileName;
        }
        else{
            $attributes['file'] = '';
        }



        product::create($attributes);

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
        //$product=product::findOrfail($product->id);
        return  view('product.edit',['product'=> $product]);
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

        $attributes=$request->validate([
            'name'=>'required|unique:products,name,'.$product->id,
            'details'=>'required',
        ]);


        if ($request->hasFile('image')) {
            if(file_exists(public_path($product->image)))
            {
                File::delete(public_path($product->image));
            }

            $imageName = "uploaded_images/".time().'.'.$request->image->extension();

            $request->image->move(public_path('uploaded_images'), $imageName);

            $attributes['image'] = $imageName;
        } else {
            $attributes['image'] = $product->image;
        }

        $product->update($attributes);
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
        if(file_exists(public_path($product->image)))
        {
            File::delete(public_path($product->image));
        }
        $product->delete();
        return redirect()->route('product.index')->with('message','Product deleted successfully');
    }
}
