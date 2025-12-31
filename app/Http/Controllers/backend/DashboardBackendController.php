<?php

namespace App\Http\Controllers\Backend;

use App\Models\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ✅ hanya bill PAID & belum di-soft delete
        $paidBillsQuery = Bill::where('status', 'paid');

        // 1️⃣ total transaksi (count bill paid)
        $totalPaidBills = $paidBillsQuery->count();

        // 2️⃣ total pemasukan uang
        $totalRevenue = $paidBillsQuery->sum('total');

        // 3️⃣ data tabel dashboard
        $bills = Bill::withTrashed()
            ->where('status', 'paid')
            ->latest()
            ->paginate(10); // dashboard biasanya paginate

        return view('pages.backend.home.index', compact(
            'bills',
            'totalPaidBills',
            'totalRevenue'
        ));
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
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
