<?php

namespace App\Http\Livewire;

use App\Models\Order_Details;
use Livewire\Component;

class OrderDetailsComponent extends Component
{
    public function render()
    {
        
        $details = Order_Details::get();
        return view('livewire.order-details-component', ['details' => $details])->layout('layouts.layout');
    }
}
