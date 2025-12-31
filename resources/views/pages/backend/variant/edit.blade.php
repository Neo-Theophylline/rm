@extends('layouts.backend.app')

@section('content')
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <a href="{{ route('product.variants.index', $product) }}"
                   style="float:right;">
                    Back
                </a>

                <div class="card-title">
                    Edit Variant – {{ $product->name }}
                </div>
                <hr>

                <form method="POST"
                      action="{{ route('product.variants.update', [$product, $variant]) }}">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="form-group col-lg-6">
                            <label>Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ $variant->name }}">
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Extra Price</label>
                            <input type="number"
                                   name="extra_price"
                                   class="form-control"
                                   value="{{ $variant->extra_price }}">
                        </div>

                    </div>

                    <div class="form-group">
                        <button class="btn btn-light px-5">
                            Update
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
