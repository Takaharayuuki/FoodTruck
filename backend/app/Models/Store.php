<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class, 'review_id', 'id');
    }
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'product_id', 'id');
    }
}
