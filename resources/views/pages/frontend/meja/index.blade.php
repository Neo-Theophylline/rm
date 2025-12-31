@extends('layouts.frontend.app')

@section('content')
    <section class="py-3"
        style="background-image: url('{{ asset('frontend/images/background-pattern.jpg') }}'); background-repeat: no-repeat; background-size: cover;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-blocks">

                        @foreach ($tables as $table)
                            <form action="{{ route('choose.table.select', $table->id) }}" method="post"
                                class="text-decoration-none mb-4 d-block">
                                @csrf
                                <button type="submit"style="all: unset; width:100%; cursor:pointer;">
                                    <div class="banner-ad card-foodmart {{ $table->type === 'premium' ? 'premium-gold' : 'regular-white' }}"
                                        style="background-image: url('{{ asset($table->type === 'premium' ? 'frontend/images/pngegg.png' : 'frontend/images/ad-image-2.png') }}');">
                                        <div class="row banner-content p-5">
                                            <div class="content-wrapper col-md-7">
                                                <span
                                                    class="badge-label
                                            {{ $table->type === 'regular' ? 'text-muted' : '' }}">
                                                    {{ strtoupper($table->type) }} SELECTION
                                                </span>
                                                <h2 class="main-title">
                                                    <span
                                                        class="{{ $table->type === 'premium' ? 'text-gold' : '' }}">{{ $table->table_name }}</span>
                                                </h2>
                                                <h3 class="sub-title">
                                                    {{ strtoupper($table->floor) }}
                                                </h3>
                                                <div class="status-box">
                                                    <span class="dot-active"
                                                        style="background-color:
                                                {{ $table->status === 'available' ? '#28a745' : '#dc3545' }}">
                                                    </span>
                                                    <p class="status-info">
                                                        {{ strtoupper($table->status) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    /* Import Google Fonts 2025 */
    @import url('fonts.googleapis.com');

    /* BASE CARD STYLE */
    .card-foodmart {
        background-repeat: no-repeat !important;
        background-position: right bottom !important;
        background-size: contain !important;
        border-radius: 20px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        overflow: hidden;
        position: relative;
        min-height: 250px;
    }

    /* TEMA PREMIUM (EMAS) */
    .premium-gold {
        background-color: #FFF9E5;
        border: 1px solid #F3E0A3;
    }

    .premium-gold .text-gold {
        color: #FFC107;
    }

    .premium-gold .badge-label {
        color: #8B7222;
    }

    .premium-gold:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(255, 193, 7, 0.25);
        border-color: #FFC107;
    }

    /* TEMA REGULER (PUTIH TIDAK PREMIUM) */
    .regular-white {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
    }

    .regular-white .main-title {
        color: #333;
    }

    .regular-white .sub-title {
        color: #888;
    }

    .regular-white:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        border-color: #ccc;
    }

    /* TYPOGRAPHY */
    .badge-label {
        font-family: 'Montserrat', sans-serif;
        font-size: 0.7rem;
        letter-spacing: 4px;
        text-transform: uppercase;
        display: block;
        margin-bottom: 5px;
        font-weight: 800;
    }

    .main-title {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 700;
        margin: 0;
        line-height: 1.1;
    }

    .sub-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 1rem;
        font-weight: 600;
        color: #555;
        letter-spacing: 1px;
        margin-top: 5px;
    }

    /* STATUS BOX */
    .status-box {
        display: inline-flex;
        align-items: center;
        margin-top: 20px;
        background: rgba(255, 255, 255, 0.7);
        padding: 6px 15px;
        border-radius: 50px;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .dot-active {
        width: 10px;
        height: 10px;
        background-color: #28a745;
        border-radius: 50%;
        margin-right: 10px;
    }

    .status-info {
        font-family: 'Montserrat', sans-serif;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 1px;
        color: #1A1A1A;
        margin: 0;
        text-transform: uppercase;
    }

    /* SHINE EFFECT (Hanya untuk Premium) */
    .premium-gold::after {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 50%;
        height: 100%;
        background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: 0.6s;
    }

    .premium-gold:hover::after {
        left: 100%;
    }
</style>
