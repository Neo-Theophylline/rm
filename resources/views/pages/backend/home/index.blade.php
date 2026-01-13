@extends('layouts.backend.app')
@section('content')
    <!--Start Dashboard Content-->
    <div class="card mt-3">
        <div class="card-content">
            <div class="row row-group m-0">
                {{-- ini count total bill yang sudah berstatus paid --}}
                <div class="col-12 col-lg-6 col-xl-6 border-light">
                    <div class="card-body">
                        <h5 class="text-white mb-0">
                            {{ $totalPaidBills }}
                            <span class="float-right">
                                <i class="fa fa-shopping-cart"></i>
                            </span>
                        </h5>
                        <p class="mb-0 text-white small-font">Total Paid Transactions</p>
                    </div>
                </div>
                {{-- ini count pemasukan uang --}}
                <div class="col-12 col-lg-6 col-xl-6 border-light">
                    <div class="card-body">
                        <h5 class="text-white mb-0">
                            Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                            <span class="float-right">
                                <i class="fa fa-usd"></i>
                            </span>
                        </h5>
                        <p class="mb-0 text-white small-font">Total Revenue</p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Latest Transactions</h5>

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
                                            No transactions found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--End Row-->

    <!--End Dashboard Content-->
@endsection
