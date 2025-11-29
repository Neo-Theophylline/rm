<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Product;
use App\Http\Controllers\Controller;

class HomeFrontendController extends Controller
{
    public function index()
    {
       $products = Product::all();

        return view('pages.frontend.home', compact('products'));
    }
}
