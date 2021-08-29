<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id')->select('id', 'name');
    }
    public function store()
    {
        return $this->belongsTo(\App\Models\Store::class, 'store_id', 'id')->select('id', 'name');
    }
}
