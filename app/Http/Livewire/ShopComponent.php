<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ShopComponent extends Component
{
    public $search;
    public $category_slug; // model
    public $max;

    public function mount()
    {
        $this->search = request()->get('search', null);
        $this->category_slug = null;
        $this->max = null;
    }

    public function render()
    {
        $products = Product::query();
        if($this->search){
            $products = $products->where('name', 'like', '%'.$this->search.'%');
        }
        if($this->category_slug){
            $category = Category::where('slug', $this->category_slug)->first();
            $products = $products->where('category_id', $category->id);
        }
        if($this->max){
            $products = $products->where('price', '<=', $this->max);
        }
        $products = $products->inRandomOrder()->limit(12)->get();
        $categories = Category::get();


        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories])->layout('layouts.layout');
    }

    public function addToCart($product_id)
    {
        $product = Product::where('id', $product_id)->first();

        if(auth()->check()){
            $cart = Cart::where('user_id', auth()->id())->where('product_id', $product_id)->first();

            if($cart){
                $cart->update([
                    'quantity' => $cart->quantity + 1,
                    'price' => ($cart->quantity + 1) * $product->price
                ]);
            } else {
                $cart = Cart::create([
                    'user_id' => auth()->id(),
                    'product_id' => $product_id,
                    'quantity' => 1,
                    'price' => $product->price * 1
                ]);
            }

            session()->flash('message', 'Mahsulot savatga muvaffaqiyatli qo\'shildi');
            return $cart;
        } else{
            return redirect()->route('login');
        }
    }
}
