<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug; // 1. property, 2. model
    // public $model;

    public function mount($slug) // => __construct
    {
        $this->slug = $slug;
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
}
