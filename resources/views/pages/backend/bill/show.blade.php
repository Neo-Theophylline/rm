@extends('layouts.backend.app')
@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card profile-card-2">
                <div class="card-body pt-5">

                    <form action="{{ route('bill.pay', $bill->id) }}" method="POST">
                        @csrf

                        <div class="row">

                            <div class="form-group col-lg-6">
                                <label>Invoice</label>
                                <input type="text" class="form-control"
                                    value="INV-{{ str_pad($bill->id, 5, '0', STR_PAD_LEFT) }}" disabled>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Status Paid</label>
                                <input type="text" class="form-control" value="{{ ucfirst($bill->status) }}" disabled>
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Note</label>
                                <input type="text" class="form-control" value="{{ $bill->note ?? '-' }}" disabled>
                            </div>

                            <div class="col-lg-12 table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bill->cart->items as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $item->product->name }}
                                                    @if ($item->variant)
                                                        <br>
                                                        <small class="text-muted">{{ $item->variant->name }}</small>
                                                    @endif
                                                </td>
                                                <td>{{ $item->qty }}</td>
                                                <td>
                                                    Rp. {{ number_format($item->price * $item->qty, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Total Cost</label>
                                <input type="text" class="form-control"
                                    value="Rp. {{ number_format($bill->total, 0, ',', '.') }}" disabled>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Paid</label>
                                <input type="number" name="paid" class="form-control" min="{{ $bill->total }}"
                                    {{ $bill->status === 'paid' ? 'disabled' : '' }}>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Change</label>
                                <input type="text" class="form-control"
                                    value="{{ $bill->change ? 'Rp. ' . number_format($bill->change, 0, ',', '.') : '-' }}"
                                    disabled>
                            </div>

                            <div class="form-group col-lg-12 d-flex justify-content-between">
                                <button type="submit" class="btn btn-success px-5"
                                    {{ $bill->status === 'paid' ? 'disabled' : '' }}>
                                    Pay
                                </button>

                                <a href="{{ route('bill.index') }}" class="btn btn-light px-5">
                                    Back
                                </a>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
