<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class KorzinkaComponent extends Component
{
    public $cart;
    public function mount(){
        $this->cart = Cart::get();
    }


    public function render()
    {
         return view('livewire.korzinka-component', ['cart'=> $this->cart])->layout('layouts.layout');
    }
}
