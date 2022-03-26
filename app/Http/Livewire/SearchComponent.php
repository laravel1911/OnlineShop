<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchComponent extends Component
{
    public $search; //is a model

    public function search()
    {
        return redirect()->route('shop', ['search' => $this->search]);
    }

    public function render()
    {
        return view('livewire.search-component');
    }
}
