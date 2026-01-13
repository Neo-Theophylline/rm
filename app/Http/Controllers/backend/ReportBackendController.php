<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportBackendController extends Controller
{

public function index(Request $request)
{
    $filter = $request->get('filter', 'week');

    $query = Bill::where('status', 'paid');

    switch ($filter) {
        case 'day':
            $query->whereDate('created_at', Carbon::today());
            break;

        case 'week':
            $query->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ]);
            break;

        case 'month':
            $query->whereMonth('created_at', Carbon::now()->month)
                  ->whereYear('created_at', Carbon::now()->year);
            break;

        case 'year':
            $query->whereYear('created_at', Carbon::now()->year);
            break;
    }

    $bills = $query->latest()->paginate(10);

    return view('pages.backend.report.index', compact('bills', 'filter'));
}

}
