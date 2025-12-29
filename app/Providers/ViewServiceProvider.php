<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('layouts.frontend.*', function ($view) {
            $cart = Cart::with(['items.product', 'items.variant'])
                ->where('status', 'active')
                ->latest()
                ->first();

            $view->with('cart', $cart);
        });
    }
}
