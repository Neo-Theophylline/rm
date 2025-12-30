@extends('layouts.backend.app')
@section('content')
    <style>
        /* ===== FIX PROFILE IMAGE (ANTI GEPENG & LONJONG) ===== */
        .profile-card-2 .profile {
            width: 75px;
            height: 75px;

            /* paksa bentuk */
            border-radius: 50%;
            overflow: hidden;

            /* ini kunci utama */
            object-fit: cover;
            object-position: center;

            /* override efek template */
            display: block;
            max-width: none;
        }
    </style>
    <div class="row mt-3 justify-content-center">
        <div class="col-lg-7">
            <div class="card profile-card-2">
                <div class="card-img-block">
                    {{-- <img class="img-fluid" src="{{ asset('backend/assets/images/bgprofil.jpg') }}" alt="Card image cap"> --}}
                </div>
                <div class="card-body pt-5">
                    <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('backend/assets/images/yt.jpg') }}"
                        alt="profile-image" class="profile">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" value="********" disabled>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="role">Role</label>
                            <input type="text" class="form-control" value="{{ $user->role }}" disabled>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="is_active">is_active</label>
                            <label>Status</label>
                            <input type="text" class="form-control" value="{{ $user->status }}" disabled>

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
