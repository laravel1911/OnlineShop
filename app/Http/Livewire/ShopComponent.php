<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ShopComponent extends Component
{
    public function render()
    {
        $products = Product::limit(12)->get();
        return view('livewire.shop-component', ['products' => $products])->layout('layouts.layout');
    }
}
