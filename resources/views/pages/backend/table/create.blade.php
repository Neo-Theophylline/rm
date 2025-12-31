@extends('layouts.backend.app')

@section('content')
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <a href="{{ route('table.index') }}" style="float:right;">Back</a>

                <div class="card-title">Add Table</div>
                <hr>

                <form method="POST" action="{{ route('table.store') }}">
                    @csrf

                    @include('pages.backend.table.form')

                    <button class="btn btn-light px-5">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
