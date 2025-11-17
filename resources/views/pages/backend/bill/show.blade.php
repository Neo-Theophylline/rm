@extends('layouts.backend.app')
@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card profile-card-2">
                <div class="card-body pt-5">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="invoice">Invoice</label>
                            <input type="text" class="form-control" name="invoice" placeholder="invoice" disabled>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="status_paid">Status Paid</label>
                            <input type="text" class="form-control" name="status_paid" placeholder="status paid"
                                disabled>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="note">Note</label>
                            <input type="text" class="form-control" name="note" placeholder="note" disabled>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th scope="row">#</th>
                                        <th scope="row">Product</th>
                                        <th scope="row">Quantity</th>
                                        <th scope="row">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><input type="text" class="form-control" readonly></td>
                                        <td><input type="text" class="form-control" readonly></td>
                                        <td><input type="text" class="form-control" readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="total_cost">Total Cost</label>
                            <input type="text" class="form-control" name="total_cost" placeholder="toctal cost">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="paid">Paid</label>
                            <input type="text" class="form-control" name="paid" placeholder="paid">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="change">change</label>
                            <input type="text" class="form-control" name="change" placeholder="change">
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <button type="submit" class="btn btn-success px-5">
                            Pay
                        </button>

                        <a href="{{ route('bill.index') }}" class="btn btn-light px-5">
                            Back
                        </a>
                    </div>

                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
