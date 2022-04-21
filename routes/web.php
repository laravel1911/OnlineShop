<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\ShopComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\ActionCartComponent;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\WishlistTableComponent;

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
// Route::group(
//     [
//         'prefix' => \LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ], function(){

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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('products' , ProductController::class);
    Route::get('/index', [UserController::class, 'index'])->name('user_index');
    Route::get('/show', [UserController::class, 'show'])->name('user_show');
    Route::get('/changestatus', [UserController::class, 'index'])->name('user_changestatus');

    Route::get('/role', [UserController::class, 'craeteRole']);
// });

Route::group(['prefix' => 'admin'], function (){
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/users', [HomeController::class, 'listOfUsers'])->name('admin.users');
    Route::get('/index', [AdminProductController::class, 'index'])->name('admin.product.index');
    Route::get('/create', [AdminProductController::class, 'create'])->name('admin.product.create');
    Route::get('/store', [AdminProductController::class, 'store'])->name('admin.product.store');
    Route::get('/show/{slug}', [AdminProductController::class, 'show'])->name('admin.product.show');
    Route::get('/edit/{slug}', [AdminProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/update/{product}', [AdminProductController::class, 'update'])->name('admin.product.update');
});
