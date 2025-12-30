@extends('layouts.backend.app')
@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{ route('product.index') }}" style="float: right;">Back</a>
                    <div class="card-title">Edit Product</div>
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

                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

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
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', $product->name) }}" placeholder="Enter Product Name">
                            </div>

                            {{-- STOCK --}}
                            <div class="form-group col-lg-6">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control" name="stock"
                                    value="{{ old('stock', $product->stock) }}" placeholder="Enter Product Stock">
                            </div>

                            {{-- PRICE --}}
                            <div class="form-group col-lg-6">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" name="price"
                                    value="{{ old('price', $product->price) }}" placeholder="Enter Price">
                            </div>

                            {{-- TYPE --}}
                            <div class="form-group col-lg-6">
                                <label for="type">Type</label>
                                <select name="type" class="form-control" required>
                                    <option value="">-- Choose Type --</option>

                                    <option value="food" {{ old('type', $product->type) === 'food' ? 'selected' : '' }}>
                                        Food
                                    </option>

                                    <option value="drink" {{ old('type', $product->type) === 'drink' ? 'selected' : '' }}>
                                        Drink
                                    </option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-light px-5">Update</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
