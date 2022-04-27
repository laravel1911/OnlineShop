<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\ShopComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\ActionCartComponent;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\OrderComponent;
use App\Http\Livewire\OrderDetailsComponent;
use App\Http\Livewire\WishlistTableComponent;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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
 Route::group(
     [
         'prefix' => LaravelLocalization::setLocale(),
         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
     ], function(){

    // Route::middleware(['checkAdmin'])->get('/test', function () {
    //     return view('welcome');
    // });

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/show/{number}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/category/edit/{number}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{number}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/destroy/{number}', [CategoryController::class, 'destroy'])->name('category.destroy');

// Route::get('/test', CategoryComponent::class)->name('home');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/cart', CartComponent::class)->name('cart');
Route::get( '/actioncart', ActionCartComponent::class)->name('actioncart');
Route::get('/', HomeComponent::class)->name('home');
Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/details/{slug}', DetailsComponent::class)->name('details');
Route::get('/wishlist', WishlistTableComponent::class)->name('wishlist');
Route::get('reviews/{order_detail_id}', \App\Http\Livewire\ReviewComponent::class)->name('review');
Route::get('/order', OrderComponent::class)->name('order');
Route::get('/order_details', OrderDetailsComponent::class)->name('order_details');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('products' , ProductController::class);
    Route::get('/index', [UserController::class, 'index'])->name('user_index');
    Route::get('/show', [UserController::class, 'show'])->name('user_show');
    Route::get('/changestatus', [UserController::class, 'index'])->name('user_changestatus');

    Route::get('/role', [UserController::class, 'craeteRole']);

    Route::group(['prefix' => 'admin'], function (){
        Route::get('/', [HomeController::class, 'index'])->name('admin.home');
        Route::get('/users', [HomeController::class, 'listOfUsers'])->name('admin.users');
        Route::get('/index', [AdminProductController::class, 'index'])->name('admin.product.index');
        Route::get('/create', [AdminProductController::class, 'create'])->name('admin.product.create');
        Route::post('/store', [AdminProductController::class, 'store'])->name('admin.product.store');
        Route::get('/show/{slug}', [AdminProductController::class, 'show'])->name('admin.product.show');
        Route::get('/edit/{slug}', [AdminProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('/update/{product}', [AdminProductController::class, 'update'])->name('admin.product.update');
        Route::get('/users/show/{id}', [AdminUserController::class, 'show'])->name('admin.show');
        Route::get('/users/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.edit');
        Route::put('/users/update/{id}', [AdminUserController::class, 'update'])->name('admin.update');
        Route::delete('/users/delete/{id}', [AdminUserController::class, 'destroy'])->name('admin.delete');
        Route::delete('/product/delete/{id}', [AdminProductController::class, 'destroy'])->name('admin.product.delete');

    Route::get('/category', [AdminCategoryController::class, 'index'])->name('category');
    Route::get('/category/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
    Route::get('/category/store', [AdminCategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/show/{id}', [AdminCategoryController::class, 'show'])->name('admin.category.show');
    Route::get('/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category/update/{id}', [AdminCategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/category/delete/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.category.delete');

    });
});

