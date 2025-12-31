<?php

namespace App\Http\Controllers\backend;

use App\Models\Bill;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillBackendController extends Controller
{
    public function pay(Request $request, Bill $bill)
    {
        // paksa load relasi
        $bill->load(['cart', 'table']);

        if (! $bill->table) {
            abort(500, 'Bill has no table assigned');
        }

        if (! $bill->cart) {
            abort(500, 'Bill has no cart assigned');
        }

        if ($bill->status === 'paid') {
            return back()->with('error', 'Bill already paid');
        }

        $request->validate([
            'paid' => 'required|integer|min:' . $bill->total,
        ]);

        $change = $request->paid - $bill->total;

        // update bill
        $bill->update([
            'status' => 'paid',
            'paid'   => $request->paid,
            'change' => $change,
        ]);

        // update cart
        $bill->cart->update([
            'status' => 'paid',
        ]);

        // ✅ FREE TABLE (AMAN)
        Table::where('id', $bill->table_id)->update([
            'status' => 'available',
        ]);

        return redirect()
            ->route('bill.index')
            ->with('success', 'Payment successful');
    }



    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $bills = Bill::latest()->paginate(10);

        return view('pages.backend.bill.index', compact('bills'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */


    public function show($id)
    {
        $bill = Bill::with([
            'table',
            'cart.items.product',
            'cart.items.variant',
        ])->findOrFail($id);

        return view('pages.backend.bill.show', compact('bill'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {

        // if ($bill->status === 'paid') {
        //     return back()->with('error', 'Paid bill cannot be deleted');
        // }

        $bill->delete(); // ✅ SOFT DELETE

        return back()->with('success', 'Bill deleted');
    }
}
