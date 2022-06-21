<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Master;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $products=Product::latest()->take(4)->get();
    //     $sliders=Slider::latest()->get();
    //     $users=User::latest()->take(4)->get();
    //     $masters=Master::latest()->take(4)->get();
        return view('index',compact(['products']));

       
    }

    
    public function show(Category $category)
    {
        $products=$category->product()->get();
        return view('products.products',compact('products'));
    }



    // متد سرچ برای فرم جستجو در بالای صفحه که به درستی جواب میدهد
    // public function search(Request $request)
    // {
    //     $keyword=request('search');
    //     $products=Product::Where('title', 'LIKE', "%{$keyword}%")->orWhere('description','LIKE', "%{$keyword}%")->get();
    //     return view('products.products',compact('products'));
    // }
    
}
