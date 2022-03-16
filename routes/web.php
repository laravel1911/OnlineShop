<?php

use App\Http\Controllers\CategoryController;
use App\Http\Livewire\CategoryComponent;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/show/{number}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/edit/{number}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/update/{number}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/destroy/{number}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/test', CategoryComponent::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
