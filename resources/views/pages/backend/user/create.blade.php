@extends('layouts.backend.app')
@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('user.index') }}" style="float: right;">Back</a>
                    <div class="card-title">Vertical Form</div>
                    <hr>
                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="image">File Browse</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" 
                                placeholder="Enter Your Name">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email"
                                    placeholder="Enter Your Email Address">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" name="password" 
                                placeholder="Enter Password">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="role">Role</label>
                                <select name="role" class="form-control select-role">
                                    <option value="" disabled selected>-- Choose Role --</option>
                                    <option value="superadmin">Superadmin</option>
                                    <option class="admin">Admin</option>
                                    <option value="waiter">Waiter</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="is_active">is_active</label>
                                <select name="is_active" class="form-control select-is_active">
                                    <option value="active">Active</option>
                                    <option class="inactive">Inactive</option>
                                </select>
                            </div>
                            {{-- jangan dihapus --}}
                            {{-- <div class="form-group col-lg-12">
                                <label>Range</label>
                                <input type="range" class="form-control">
                            </div> --}}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-light px-5">{{-- <i class="icon-lock"></i> --}} Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
