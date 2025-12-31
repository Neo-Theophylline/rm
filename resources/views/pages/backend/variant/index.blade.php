@extends('layouts.backend.app')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{ route('product.index') }}" style="float:right;">
                        Back
                    </a>

                    <div class="card-title">
                        Variant – {{ $product->name }}
                    </div>
                    <hr>

                    {{-- FORM CREATE --}}
                    <form method="POST" action="{{ route('product.variants.store', $product) }}">
                        @csrf

                        <div class="row">

                            <div class="form-group col-lg-6">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Variant Name">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Extra Price</label>
                                <input type="number" name="extra_price" class="form-control"
                                    placeholder="Enter Extra Price">
                            </div>

                        </div>

                        <div class="form-group">
                            <button class="btn btn-light px-5">
                                Submit
                            </button>
                        </div>
                    </form>

                    <hr>

                    {{-- TABLE --}}
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Extra Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product->variants as $variant)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $variant->name }}</td>
                                        <td>{{ number_format($variant->extra_price) }}</td>
                                        <td>
                                            <a href="{{ route('product.variants.edit', [$product, $variant]) }}"
                                                class="btn btn-outline-warning btn-sm">Edit</a>

                                            <form action="{{ route('product.variants.destroy', [$product, $variant]) }}"
                                                method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                                    onclick="return confirm('Hapus variant?')">
                                                    Delete
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
