<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use App\Traits\MyTrait;

class ShopComponent extends Component
{
    use MyTrait;
    public $search;
    public $category_slug; // model
    public $max;
    public $quantity;
    public $min;

    public function mount()
    {
        $this->search = request()->get('search', null);
        $this->category_slug = null;
        $this->max = null;
        $this->min = null;
        $this->quantity = 1;
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
        $products = $products->inRandomOrder()->limit(12)->get();
        $categories = Category::get();


        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories])->layout('layouts.layout');
    }

    public function addToCart($product_id)
    {
        $this->actionCart($product_id);
    }
}
