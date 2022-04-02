<?php

namespace App\Http\Livewire;

use App\Models\{Product, Cart};
use Livewire\Component;

class CartComponent extends Component
{

    public function delete($id)
    {
        // dd($id);
        $cart = Cart::find($id); //Cart::where('id', $id)->first();
        if($cart)
            return $cart->delete();

        return false;
    }

    public function render()
    {
        $cart = null;
        if(auth()->check()){
            $cart = Cart::with('product')->where('user_id', auth()->id())->get();
        }
        $product = Product::inRandomOrder()->limit(4)->get();
        $product2 = Product::inRandomOrder()->limit(2)->get();
        $recent_products = Product::inRandomOrder()->limit(5)->get();
        return view('livewire.cart-component',
        [
            'product' => $product,
            'product2' => $product2,
            'recent_products' => $recent_products,
            'cart' => $cart
            ])->layout('layouts.layout');
    }
}
