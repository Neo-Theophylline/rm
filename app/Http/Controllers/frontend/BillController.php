<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
public function pay(Bill $bill)
{
    $bill->update(['status' => 'paid']);

    $bill->table->update([
        'status' => 'available'
    ]);

    return back()->with('success', 'Pembayaran selesai');
}

}
