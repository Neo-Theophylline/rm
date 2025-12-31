<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $guarded = [];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function activeCart()
    {
        return $this->hasOne(Cart::class)->where('status', 'draft');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}


