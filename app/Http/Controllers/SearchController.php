<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
       
        $products=Product::Where('title', 'LIKE', "%{$request->search}%")->orWhere('description','LIKE', "%{$request->search}%")->get();
        return view('search',compact('products'));
    }
}
