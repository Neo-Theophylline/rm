<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Cart;
use App\Models\Product;
use App\Http\Controllers\Controller;

class MenuFrontendController extends Controller
{
    public function index(Cart $cart)
    {
       $products = Product::with('variants')->get();

        return view('pages.frontend.menu.index', compact('products', 'cart'));
    }
}
