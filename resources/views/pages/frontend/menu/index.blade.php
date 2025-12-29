@extends('layouts.frontend.app')
@section('content')
    <section class="py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bootstrap-tabs product-tabs">
                        <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                            <h3>Menu - {{ $cart->table->table_name }}</h3>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a href="#all" class="nav-link text-uppercase fs-6 active" id="nav-all-tab"
                                        data-bs-toggle="tab" data-bs-target="#all">All</a>
                                    <a href="#food" class="nav-link text-uppercase fs-6" id="nav-fruits-tab"
                                        data-bs-toggle="tab" data-bs-target="#food">Food</a>
                                    <a href="#drink" class="nav-link text-uppercase fs-6" id="nav-juices-tab"
                                        data-bs-toggle="tab" data-bs-target="#drink">Drinks</a>
                                </div>
                            </nav>
                        </div>
                        <div class="tab-content" id="nav-tabContent">

                            {{-- all --}}
                            <div class="tab-pane fade show active" id="all">
                                <div class="row row-cols-1 row-cols-md-4 g-4">
                                    @foreach ($products as $product)
                                        @include('pages.frontend.menu._product-card', [
                                            'product' => $product,
                                            'cart' => $cart,
                                        ])
                                    @endforeach
                                </div>
                            </div>

                            {{-- food --}}
                            <div class="tab-pane fade" id="food">
                                <div class="row row-cols-1 row-cols-md-4 g-4">
                                    @foreach ($products->where('type', 'food') as $product)
                                        @include('pages.frontend.menu._product-card', [
                                            'product' => $product,
                                            'cart' => $cart,
                                        ])
                                    @endforeach
                                </div>
                            </div>

                            {{-- drink --}}
                            <div class="tab-pane fade" id="drink">
                                <div class="row row-cols-1 row-cols-md-4 g-4">
                                    @foreach ($products->where('type', 'drink') as $product)
                                        @include('pages.frontend.menu._product-card', [
                                            'product' => $product,
                                            'cart' => $cart,
                                        ])
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
