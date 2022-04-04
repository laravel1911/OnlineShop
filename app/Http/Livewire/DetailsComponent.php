<?php

namespace App\Http\Livewire;

use App\Models\{Product, Cart, Wishlist};
use Livewire\Component;
use App\Traits\MyTrait;

class DetailsComponent extends Component
{
    use MyTrait;
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
        $wishlist = Wishlist::where('user_id', auth()->id())->where('product_id', $product->id)->first();
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(6)->get();
        $random_products = Product::where('category_id', '!=', $product->category_id)->inRandomOrder()->limit(4)->get();
        $recent_products = Product::inRandomOrder()->limit(5)->get();

        return view('livewire.details-component',
        [
            'product' => $product,
            'random_products' => $random_products,
            'recent_product' => $recent_products,
            'related_products' => $related_products,
            'wishlist' => $wishlist
        ])->layout('layouts.layout');
    }
      // DRY don't repeat yourself
    public function addToCart($product_id)
    {
        $this->actionCart($product_id);
    }

    public function addWishlist($product_id)
    {
        $this->addToWishlist($product_id);
    }
}
