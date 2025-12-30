@extends('layouts.backend.app')
@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{ route('user.index') }}" style="float: right;">Back</a>
                    <div class="card-title">Create User</div>
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

                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            {{-- IMAGE --}}
                            <div class="form-group col-lg-6">
                                <label for="image">Profile Image</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile"></label>
                                </div>
                            </div>

                            {{-- NAME --}}
                            <div class="form-group col-lg-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    placeholder="Enter Name">
                            </div>

                            {{-- EMAIL --}}
                            <div class="form-group col-lg-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="Enter Email">
                            </div>

                            {{-- PASSWORD --}}
                            <div class="form-group col-lg-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                            </div>

                            {{-- ROLE --}}
                            <div class="form-group col-lg-6">
                                <label for="role">Role</label>
                                <select name="role" class="form-control select-role" required>
                                    <option value="">-- Choose Role --</option>

                                    <option value="superadmin" {{ old('role') === 'superadmin' ? 'selected' : '' }}>
                                        Superadmin
                                    </option>

                                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>
                                        Admin
                                    </option>

                                    <option value="waiter" {{ old('role') === 'waiter' ? 'selected' : '' }}>
                                        Waiter
                                    </option>
                                </select>
                            </div>


                            {{-- STATUS --}}
                            <div class="form-group col-lg-6">
                                <label for="status">Status</label>
                                <select name="status" class="form-control select-status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>

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
