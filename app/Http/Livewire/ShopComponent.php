<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ShopComponent extends Component
{
    public $search;

    public function mount()
    {
        $this->search = request()->get('search', null);
    }

    public function render()
    {
        $products = Product::query();
        if($this->search){
            $products = $products->where('name', 'like', '%'.$this->search.'%');
        }
        $products = $products->inRandomOrder()->limit(12)->get();
        return view('livewire.shop-component', ['products' => $products])->layout('layouts.layout');
    }
}
