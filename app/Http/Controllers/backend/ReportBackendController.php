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
    $value  = $request->get('value');

    $query = Bill::where('status', 'paid');
    $label = '';

    switch ($filter) {
        case 'day':
            $date = $value ? Carbon::parse($value) : Carbon::today();
            $query->whereDate('created_at', $date);
            $label = $date->format('d F Y');
            break;

        case 'week':
            $week = $value ? substr($value, 6) : now()->weekOfYear;
            $year = $value ? substr($value, 0, 4) : now()->year;

            $start = Carbon::now()->setISODate($year, $week)->startOfWeek();
            $end   = Carbon::now()->setISODate($year, $week)->endOfWeek();

            $query->whereBetween('created_at', [$start, $end]);
            $label = "Week $week - $year";
            break;

        case 'month':
            [$year, $month] = $value
                ? explode('-', $value)
                : [now()->year, now()->month];

            $query->whereYear('created_at', $year)
                  ->whereMonth('created_at', $month);

            $label = Carbon::create($year, $month)->format('F Y');
            break;

        case 'year':
            $year = $value ?? now()->year;
            $query->whereYear('created_at', $year);
            $label = (string) $year;
            break;
    }

    $bills = $query->latest()->paginate(10)->withQueryString();

    return view('pages.backend.report.index', compact(
        'bills',
        'filter',
        'value',
        'label'
    ));
}

}
