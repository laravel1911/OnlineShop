<?php

namespace App\Http\Livewire;

use App\Models\Order_Details;
use App\Models\Product;
use App\Models\Review;
use Livewire\Component;

class ReviewComponent extends Component
{
    public $order_detail_id;
    public $rating;
    public $comment;
    public function mount($order_detail_id)
    {
        $this->order_detail_id = $order_detail_id;
        $this->rating = 5;
    }

    public function store()
    {
        if(auth()->check()){
            $order_detail = Order_Details::with('product')->find($this->order_detail_id);
            if($order_detail->rating === 1){
                Review::create([
                    'rating' => $this->rating,
                    'comment' => $this->comment,
                    'user_id' => auth()->id(),
                    'product_id' => $order_detail->product->id
                ]);
                $order_detail->update(['rating' => 2]);
            }
            return redirect()->route('details', ['slug' => $order_detail->product->slug]);
        }
        return redirect()->route('login');
    }
    public function render()
    {
//        dd($this->order_detail_id);
        $order_detail = Order_Details::with('product')->find($this->order_detail_id);
        return view('livewire.review-component', ['order_detail' => $order_detail])->layout('layouts.layout');
    }
}
