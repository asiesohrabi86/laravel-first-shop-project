<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::latest()->paginate(10);
        return view('admin.categories.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories=Category::Where('category_id',null)->get();
        return view('admin.categories.create',compact('parentCategories'));
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
            'name'=>['required','string','max:255'],
            'slug'=>['unique:categories'],
            'category_id'=>['nullable','exists:categories,id'],
        ]);

        if(empty($request->slug))
        {
            $slug=SlugService::createSlug(Category::class,'slug',$request->name);
        }
        else{
            $slug=SlugService::createSlug(Category::class,'slug',$request->slug);
        }

        $request->merge(['slug'=>$slug]);

        Category::create($request->all());

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parentCategories=Category::Where('category_id',null)->get();
        return view('admin.categories.edit',compact(['category','parentCategories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>['required','string','max:255'],
            'slug'=>'unique:categories',
            'category_id'=>['nullable','exists:categories,id'],
        ]);

        if(empty($request->slug))
        {
            $slug=SlugService::createSlug(Category::class,'slug',$request->name);
        }
        else
        {
            $slug=SlugService::createSlug(Category::class,'slug',$request->slug);  
        }

        $request->merge(['slug'=>$slug]);

        // dd($request->all());
        $category->update([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'category_id'=>$request->category_id,
        ]);

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
