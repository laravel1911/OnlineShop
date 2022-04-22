<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->get();
        return view('admin.product.index', ['product' => $product]);
    }

    public function create()
    {
        $categories = Category::get();
        // dd($categories);

        return view('admin.product.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $category = null;
        if($request->category_name){
            $category = Category::create(['name' => $request->category_name]);
        }

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'status' => 'required',
            'image' => 'required',
            'images' => 'required'
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $category ? $category->id : $request->category_id,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'status' => $request->status,
            'image' => $request->image,
            'images' => $request->images,
        ]);

        return redirect()->route('admin.product.index');
    }

    public function show(Product $product)
    {
        // dd($product
        return view('admin.product.show', ['product' => $product]);
    }
    public function edit($id)
    {
        $categories = Category::get();

        $product = Product::where('id', '=', $id)->first();

        return view('admin.product.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, Product $product)
    {
        
    }
}


