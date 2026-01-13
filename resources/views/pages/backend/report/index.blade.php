@extends('layouts.backend.app')

@section('content')
    <div class="mb-3">
        <a href="{{ route('report.index', ['filter' => 'day']) }}"
            class="btn btn-sm {{ $filter == 'day' ? 'btn-primary' : 'btn-outline-primary' }}">
            Daily
        </a>

        <a href="{{ route('report.index', ['filter' => 'week']) }}"
            class="btn btn-sm {{ $filter == 'week' ? 'btn-primary' : 'btn-outline-primary' }}">
            Weekly
        </a>

        <a href="{{ route('report.index', ['filter' => 'month']) }}"
            class="btn btn-sm {{ $filter == 'month' ? 'btn-primary' : 'btn-outline-primary' }}">
            Monthly
        </a>

        <a href="{{ route('report.index', ['filter' => 'year']) }}"
            class="btn btn-sm {{ $filter == 'year' ? 'btn-primary' : 'btn-outline-primary' }}">
            Yearly
        </a>
    </div>


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Transaction Report</h5>

            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice</th>
                            <th>Total Cost</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bills as $bill)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>INV-{{ str_pad($bill->id, 5, '0', STR_PAD_LEFT) }}</td>
                                <td>Rp {{ number_format($bill->total, 0, ',', '.') }}</td>
                                <td>{{ $bill->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    No transactions found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3 d-flex justify-content-end">
                    {{ $bills->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
