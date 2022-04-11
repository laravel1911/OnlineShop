<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Livewire\Component;
use App\Traits\MyTrait;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use MyTrait, WithPagination;
    public $search;
    public $category_slug; // model
    public $max;
    public $quantity;
    public $min;
    public $wishlist;

    public function mount()
    {
        $this->search = request()->get('search', null);
        $this->category_slug = null;
        $this->max = null;
        $this->min = null;
        $this->quantity = 1;
        $this->wishlist = null;
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
        if($this->min){
            $products = $products->where('price', '>=', $this->min);
        }
        $products = $products->paginate(4);
        $categories = Category::get();
        $wishlists = Wishlist::where('user_id', auth()->id())->get();
        // dd($wishlists);
        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories, 'wishlists' => $wishlists])->layout('layouts.layout');
    }

    public function addToCart($product_id)
    {
        $this->actionCart($product_id);
    }

    public function addwishlist($product_id)
    {
        $this->addToWishlist($product_id);
    }
}
