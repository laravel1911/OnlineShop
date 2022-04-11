<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class KorzinkaComponent extends Component
{
    public $cart;
    protected $listeners = ['load' => '$refresh'];

    public function render()
    {
        //if(auth()->check())
        //{
            $this->cart = Cart::get();
            return view('livewire.korzinka-component', ['cart'=> $this->cart])->layout('layouts.layout');
        //}

        //return redirect()->route('login');
    }
}
