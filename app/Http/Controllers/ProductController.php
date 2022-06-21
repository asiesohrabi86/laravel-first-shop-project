<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        $products=Product::latest()->paginate(20);
        return view('products.products',compact('products'));
    }

    public function singleproduct(Product $product)
    {
        return view('products.singleproduct',compact('product'));
    }
}
