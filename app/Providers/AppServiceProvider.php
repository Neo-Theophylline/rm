<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
    use App\Models\Cart;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
public function boot(): void
{
    View::composer('layouts.frontend.cart', function ($view) {

        $cart = Cart::with('items.product', 'items.variant')
            ->where('status', 'draft')
            ->first();

        $view->with('cart', $cart);
    });
}

}
