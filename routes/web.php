<?php

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

Route::get('/', [App\Http\Controllers\ProductController::class, 'show'])->name('show');;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('create_product');
Route::post('/product/create', [App\Http\Controllers\ProductController::class, 'store'])->name('store');
Route::post('/product/update/{product}', [App\Http\Controllers\ProductController::class, 'change'])->name('change');
Route::get('/product/update/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('update');
Route::get('/product/delete/{product}', [App\Http\Controllers\ProductController::class, 'delete'])->name('delete');
Route::get('/product/search', [App\Http\Controllers\ProductController::class, 'search'])->name('search');

Route::middleware('auth','role:1')->group(function(){
    Route::get('/admin/product', [App\Http\Controllers\ProductController::class, 'index'])->name('admin');
    Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'index'])->name('admin');
});
Route::get('/admin/user/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
Route::post('/admin/user/edit/{user}', [App\Http\Controllers\UserController::class, 'save'])->name('edit');
Route::get('/admin/user/delete/{user}', [App\Http\Controllers\UserController::class, 'delete'])->name('edit');
Route::get('/admin/product/create_categorie', [App\Http\Controllers\CategorieController::class, 'index'])->name('create');
Route::post('/admin/product/create_categorie', [App\Http\Controllers\CategorieController::class, 'create'])->name('create');
Route::get('/product/{product}',[App\Http\Controllers\ProductController::class, 'product'])->name('product');
Route::get('/categorie/{categorie}',[App\Http\Controllers\ProductController::class, 'viewbycategory'])->name('viewbycategory');
Route::post('/panier/add/{id}',[App\Http\Controllers\CartController::class, 'add'])->name('addtocart');
Route::get('/panier',[App\Http\Controllers\CartController::class, 'index'])->name('cart_index');
Route::get('/commands',[App\Http\Controllers\ProductController::class, 'purshase'])->name('commands');
Route::get('/purshases',[App\Http\Controllers\UserController::class, 'purshases'])->name('purshases');
Route::get('/admin/product/create_promotion', [App\Http\Controllers\PromotionController::class, 'index'])->name('create_promotion');
Route::post('/admin/product/create_promotion', [App\Http\Controllers\PromotionController::class, 'start_promotion'])->name('promotion_started');