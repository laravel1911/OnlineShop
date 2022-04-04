<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class Checkout extends Component
{
    public function render()
    {
        if(auth()->check()){
            $cart = Cart::where('user_id', auth()->id())->get();
            $products = Product::inRandomOrder()->limit(4)->get();
            $recent_products = Product::inRandomOrder()->limit(5)->get();
            return view('livewire.checkout',
            [
                'products' => $products,
                'recent_products' => $recent_products,
                'cart' => $cart
                ])->layout('layouts.layout');
        }
        return redirect()->route('login');
    }
}
