<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
public function boot(): void
{
    View::composer('*', function ($view) {

        $cart = null;

        if (session()->has('cart_id')) {
            $cart = Cart::with(['items.product', 'items.variant'])
                ->find(session('cart_id'));
        }

        $view->with('cart', $cart);
    });
}

}
