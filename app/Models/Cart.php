<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Table;

class Cart extends Model
{
    protected $guarded = [];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}

