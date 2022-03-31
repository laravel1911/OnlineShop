<?php

namespace App\Http\Livewire;

use App\Models\{Product, Cart};
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug; // 1. property, 2. model
    // public $model;
    public $quantity;

    public function mount($slug) // => __construct
    {
        $this->slug = $slug;
        $this->quantity = 1;
    }

    public function render()
    {
        $product = Product::with('category')->where('slug', $this->slug)->first(); // slug =>> id
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(6)->get();
        $random_products = Product::where('category_id', '!=', $product->category_id)->inRandomOrder()->limit(4)->get();
        $recent_products = Product::inRandomOrder()->limit(5)->get();

        return view('livewire.details-component',
        [
            'product' => $product,
            'random_products' => $random_products,
            'recent_product' => $recent_products,
            'related_products' => $related_products
        ])->layout('layouts.layout');
    }

    public function addToCart($product_id)
    {
        $product = Product::where('id', $product_id)->first();
        if(auth()->check()){
            $cart = Cart::where('user_id', auth()->id())->where('product_id', $product_id)->first();
            if($cart){
                $cart->update([
                    'quantity' => $cart->quantity + $this->quantity,
                    'price' => ($cart->quantity + $this->quantity) * $product->price
                ]);
            } else{
                $cart = Cart::create([
                    'user_id' => auth()->id(),
                    'product_id' => $product_id,
                    'quantity' => $this->quantity,
                    'price' => $product->price * $this->quantity
                ]);
            }
            session()->flash('message', 'Mahsulot savatga muvaffaqiyatli qo\'shildi');
            return $cart;
        } else{
            return redirect()->route('login');
        }
    }
}
