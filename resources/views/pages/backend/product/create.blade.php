@extends('layouts.backend.app')
@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{ route('product.index') }}" style="float: right;">Back</a>
                    <div class="card-title">Create Product</div>
                    <hr>

                    {{-- ERROR MESSAGE --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            {{-- IMAGE --}}
                            <div class="form-group col-lg-6">
                                <label for="customFile">Product Image</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile"></label>
                                </div>
                            </div>

                            {{-- NAME --}}
                            <div class="form-group col-lg-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    placeholder="Enter Product Name">
                            </div>

                            {{-- STOCK --}}
                            <div class="form-group col-lg-6">
                                <label for="product_stock">Stock</label>
                                <input type="number" class="form-control" name="product_stock"
                                    value="{{ old('product_stock') }}" placeholder="Enter Product Stock">
                            </div>

                            {{-- PRICE --}}
                            <div class="form-group col-lg-6">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" name="price" value="{{ old('price') }}"
                                    placeholder="Enter Price">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-light px-5">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
