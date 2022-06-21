<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
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
        $products=Product::latest()->paginate(10);
        return view('admin.products.products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
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
            'title'=>'required',
            'slug'=>'unique:products',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required',
            'categories'=>'required',
            'inventory'=>'required',
        ]);


        if(empty(request('slug')))
        {
            $slug=SlugService::createSlug(Product::class,'slug', request('title'));
        }
        else
        {
            $slug=SlugService::createSlug(Product::class,'slug',request('slug'));
        }

        $request->merge(['slug'=>$slug]);

        $product=auth()->user()->product()->create([
            'title'=>request('title'),
            'slug'=>request('slug'),
            'description'=>request('description'),
            'price'=>request('price'),
            'image'=>request('image'),
            'inventory'=>request('inventory'),

        ]);

        $product->category()->attach(request('categories'));
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title'=>'required',
            'slug'=>'unique:products',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required',
            'categories'=>'required',
            'inventory'=>'required',
            
        ]);


        if(empty(request('slug')))
        {
            $slug=SlugService::createSlug(Product::class,'slug', request('title'));
        }
        else
        {
            $slug=SlugService::createSlug(Product::class,'slug',request('slug'));
        }

        $request->merge(['slug'=>$slug]);

        $product->update([
            'title'=>request('title'),
            'slug'=>request('slug'),
            'description'=>request('description'),
            'price'=>request('price'),
            'image'=>request('image'),
            'inventory'=>request('inventory'),
        ]);

        $product->category()->sync(request('categories'));
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
