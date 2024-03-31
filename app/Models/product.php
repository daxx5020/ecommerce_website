<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'discounted_price',
        'main_price',
        'SKU',
        'reviews',
        'short_description',
        'description',
        'size',
        'category_id',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }

    public function orderItems()
    {
    return $this->hasMany(OrderItem::class);
    }
}
