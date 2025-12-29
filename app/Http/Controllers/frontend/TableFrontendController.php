<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Table;
use App\Models\Cart;

class TableFrontendController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('pages.frontend.meja.index', compact('tables'));
    }

    public function select(Table $table)
    {
        $cart = $table->activeCart;

        if (!$cart) {
            // kalau belum ada → buat cart baru
            $cart = Cart::create([
                'table_id' => $table->id,
                'status' => 'draft',
            ]);

            // ubah status meja
            $table->update([
                'status' => 'occupied'
            ]);
        }

        // redirect ke halaman menu
        return redirect()->route('pages.frontend.menu.index', $cart->id);
    }
}
