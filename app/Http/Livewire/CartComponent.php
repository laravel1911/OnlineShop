<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CartComponent extends Component
{
    public function render()
    {

        $product = Product::inRandomOrder()->limit(4)->get();
        $product2 = Product::inRandomOrder()->limit(2)->get();
        $recent_products = Product::inRandomOrder()->limit(5)->get();
        return view('livewire.cart-component',
        [
            'product' => $product,
            'product2' => $product2,
            'recent_products' => $recent_products
            ])->layout('layouts.layout');
    }
}
