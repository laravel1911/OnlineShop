<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        $params = $request->validate([
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
        // dd($params);

        $category = null;
        if($request->category_name){
            $category = Category::create([
                'name' => $request->category_name,
                'slug' => \Str::slug($request->name)
            ]);
        }

        $image_name = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('/public/images', $image_name);
        $images = null;
        if(isset($request->images)){
            if($request->hasFile('images'))
            {
                $image_names = [];
                foreach($request->file('images') as $key => $item){
                    $file_names = time() . '_' . $key . '.' . $item->getClientOrginalExtension();
                    $item->storeAs('/public/images/', $file_names);
                    $image_names[] = $file_names;
                }
                $images = implode(',', $image_names);
            }
        }



        Product::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
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

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        // dd($product);

        return view('admin.product.show', ['product' => $product]);
    }
    public function edit($slug)
    {
        $categories = Category::get();

        $product = Product::where('slug', $slug)->first();

        return view('admin.product.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, Product $product)
    {

    }
}


