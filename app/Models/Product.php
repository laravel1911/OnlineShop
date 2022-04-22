<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'category_id',
        'quantity',
        'description',
        'short_description',
        'status',
        'image',
        'images'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'product_id', 'id');
    }
}
