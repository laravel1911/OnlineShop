<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\ShopComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::get('/test', function () {
    return view('welcome');
});

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
Route::get('/', HomeComponent::class)->name('home');
Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/details/{slug}', DetailsComponent::class)->name('details');
Route::get('/wishlist', WishlistTableComponent::class)->name('wishlist');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('products' , ProductController::class);
Route::get('/index', [UserController::class, 'index'])->name('user_index');
Route::get('/show', [UserController::class, 'show'])->name('user_show');
Route::get('/changestatus', [UserController::class, 'index'])->name('user_changestatus');
