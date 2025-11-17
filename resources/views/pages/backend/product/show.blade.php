@extends('layouts.backend.app')
@section('content')
    <style>
        .profile-card-product .card-img-block {
            float: left;
            width: 100%;
            height: 250px;
            overflow: hidden;
        }
    </style>
    <div class="row mt-3 justify-content-center">
        <div class="col-lg-7">
            <div class="card profile-card-product">
                <div class="card-img-block">
                    <img class="img-fluid" src="{{ asset('backend/assets/images/bgprofil.jpg') }}" alt="Card image cap">
                </div>
                <div class="card-body pt-5">
                    {{-- <img src="{{ asset('backend/assets/images/yt.jpg') }}" alt="profile-image" class="profile"> --}}
                    <h5 class="card-title">Name</h5>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="product_stock">Product Stock</label>
                            <input type="text" class="form-control" name="product_stock" placeholder="Product Stock"
                                disabled>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" placeholder="price" disabled>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <a href="{{ route('product.index') }}"> <button type="submit"
                                class="btn btn-light px-5">{{-- <i class="icon-lock"></i> --}} Back</button>
                        </a>
                    </div>
                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
