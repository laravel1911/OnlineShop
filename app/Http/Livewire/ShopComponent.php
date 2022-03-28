<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ShopComponent extends Component
{
    public $search;
    public $category_slug; // model

    public function mount()
    {
        $this->search = request()->get('search', null);
        $this->category_slug = null;
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
        $products = $products->inRandomOrder()->limit(12)->get();
        $categories = Category::get();
        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories])->layout('layouts.layout');
    }
}
