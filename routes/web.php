<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[App\Http\Controllers\IndexController::class,'index'])->name('index');

Route::get('/products',[App\Http\Controllers\ProductController::class,'products'])->name('products');
Route::get('/singleproduct/{product:slug}',[App\Http\Controllers\ProductController::class,'singleproduct'])->name('singleproduct');




Auth::routes(['verify'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function()
{
    Route::post('comments',[HomeController::class,'comment'])->name('send.comment');
});

Route::get('/category/{category:slug}',[IndexController::class,'show'])->name('category.show');

// روت زیر برای فرم جستجو در بالای سایت است که با این روش هم به درستی جواب میدهد
// Route::get('/search',[IndexController::class,'search'])->name('product.search');

Route::get('/search',[SearchController::class,'search'])->name('product.search');


Route::prefix('/panel')->middleware('checkuser')->group(function(){

    Route::get('', [AdminController::class , 'index'])->name('panel');
    Route::resource('/users' , UserController::class);
    Route::resource('/products' , ProductController::class);
    Route::resource('/categories',CategoryController::class);
    Route::resource('/comments',CommentController::class)->only(['index','update','destroy']);
    Route::get('/comments/unapproved',[CommentController::class,'unapproved'])->name('unapproved.comment');

});

Route::post('/cart/add/{product}' , [CartController::class , 'addToCart'])->name('cart.add');

Route::get('cart',[CartController::class,'cart'])->name('cart');

Route::patch('/cart/quantity/change',[CartController::class,'quantityChange']);

Route::delete('cart/delete/{cart}',[CartController::class,'delete'])->name('cart.destroy');

