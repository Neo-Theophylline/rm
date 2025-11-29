@extends('layouts.backend.app')
@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('option.index') }}" style="float: right;">Back</a>
                    <div class="card-title">Vertical Form</div>
                    <hr>

                    <form action="{{ route('option.update', $option->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $option->name }}"
                                    placeholder="Enter Option Name">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control" name="stock" value="{{ $option->stock }}"
                                    placeholder="Enter Stock">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" name="price" value="{{ $option->price }}"
                                    placeholder="Enter Price">
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
