@extends('layouts.backend.app')
@section('content')
    <div class="row mt-3 justify-content-center">
        <div class="col-lg-7">
            <div class="card profile-card-2">
                <div class="card-img-block">
                    {{-- <img class="img-fluid" src="{{ asset('backend/assets/images/bgprofil.jpg') }}" alt="Card image cap"> --}}
                </div>
                <div class="card-body pt-5">
                    <img src="{{ asset('backend/assets/images/yt.jpg') }}" alt="profile-image" class="profile">
                    <h5 class="card-title">Name</h5>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email Address" disabled>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" placeholder="Password" disabled>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="role">Role</label>
                            <input type="text" class="form-control" name="role" placeholder="Role" disabled>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="is_active">is_active</label>
                            <input type="text" class="form-control" name="is_active" placeholder="Status is_active"
                                disabled>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <a href="{{ route('user.index') }}"> <button type="submit"
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
