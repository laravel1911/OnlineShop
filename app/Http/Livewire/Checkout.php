<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Checkout extends Component
{
    public function render()
    {
        $products = Product::inRandomOrder()->limit(4)->get();
        $recent_products = Product::inRandomOrder()->limit(5)->get();
        return view('livewire.checkout',
        [
            'products' => $products,
            'recent_products' => $recent_products
            ])->layout('layouts.layout');
    }
}
