@extends('layouts.backend.app')
@section('content')
    {{-- <style>
        .profile-card-product .card-img-block {
            float: left;
            width: 100%;
            height: 250px;
            overflow: hidden;
        }
    </style> --}}
    <style>
        .card-title {
            font-size: 30px ;
        }

        .profile-card-product .card-img-block {
            width: 100%;
            height: 250px;
            overflow: hidden;
            position: relative;
        }

        .profile-card-product .card-img-block img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* bikin foto penuh & rapi */
            object-position: center;
        }
    </style>


    <div class="row mt-3 justify-content-center">
        <div class="col-lg-7">
            <div class="card profile-card-product">

                {{-- Banner --}}
                <div class="card-img-block">
                    <img class="img-fluid"
                        src="{{ $product->image ? asset('storage/' . $product->image) : asset('backend/assets/images/no-image.png') }}"
                        alt="Product image">
                </div>

                <div class="card-body pt-5">

                    {{-- NAME --}}
                    <h5 class="card-title">{{ $product->name }}</h5>

                    <div class="row">

                        {{-- STOCK --}}
                        <div class="form-group col-lg-6">
                            <label for="stock">Product Stock</label>
                            <input type="text" class="form-control" value="{{ $product->stock }}" disabled>
                        </div>

                        {{-- PRICE --}}
                        <div class="form-group col-lg-6">
                            <label for="price">Price</label>
                            <input type="text" class="form-control"
                                value="Rp {{ number_format($product->price, 0, ',', '.') }}" disabled>
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Type</label>
                            <input type="text" class="form-control text-capitalize" value="{{ $product->type }}"
                                disabled>
                        </div>


                    </div>

                    {{-- BACK --}}
                    <div class="form-group d-flex justify-content-center">
                        <a href="{{ route('product.index') }}">
                            <button type="button" class="btn btn-light px-5">Back</button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
