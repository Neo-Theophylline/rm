<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
