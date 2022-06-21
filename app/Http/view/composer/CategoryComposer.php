<?php

namespace App\Http\view\composer;
use Illuminate\View\View;
use App\Models\Category;

class CategoryComposer
{
//    protected $categories;


    public function compose(View $view)
    {
        $view->with('categories',Category::get());
    }
}




?>