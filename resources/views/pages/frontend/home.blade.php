@extends('layouts.frontend.app')
@section('content')
    <section class="py-3"
        style="background-image: url('frontend/images/background-pattern.jpg');background-repeat: no-repeat;background-size: cover;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="banner-blocks">

                        <div class="banner-ad large bg-info block-1">

                            <div class="swiper main-swiper">
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide">
                                        <div class="row banner-content p-5">
                                            <div class="content-wrapper col-md-7">
                                                <div class="categories my-3">100% natural</div>
                                                <h3 class="display-4">Fresh Smoothie & Summer Juice</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim massa
                                                    diam elementum.</p>
                                            </div>
                                            <div class="img-wrapper col-md-5">
                                                <img src="frontend/images/product-thumb-1.png" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="row banner-content p-5">
                                            <div class="content-wrapper col-md-7">
                                                <div class="categories mb-3 pb-3">100% natural</div>
                                                <h3 class="banner-title">Fresh Smoothie & Summer Juice</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim massa
                                                    diam elementum.</p>
                                            </div>
                                            <div class="img-wrapper col-md-5">
                                                <img src="frontend/images/product-thumb-1.png" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="row banner-content p-5">
                                            <div class="content-wrapper col-md-7">
                                                <div class="categories mb-3 pb-3">100% natural</div>
                                                <h3 class="banner-title">Heinz Tomato Ketchup</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim massa
                                                    diam elementum.</p>
                                            </div>
                                            <div class="img-wrapper col-md-5">
                                                <img src="frontend/images/product-thumb-2.png" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-pagination"></div>

                            </div>
                        </div>

                        <div class="banner-ad bg-success-subtle block-2"
                            style="background:url('frontend/images/ad-image-1.png') no-repeat;background-position: right bottom">
                            <div class="row banner-content p-5">

                                <div class="content-wrapper col-md-7">
                                    <div class="categories sale mb-3 pb-3">20% off</div>
                                    <h3 class="banner-title">Fruits & Vegetables</h3>
                                </div>

                            </div>
                        </div>

                        <div class="banner-ad bg-danger block-3"
                            style="background:url('frontend/images/ad-image-2.png') no-repeat;background-position: right bottom">
                            <div class="row banner-content p-5">

                                <div class="content-wrapper col-md-7">
                                    <div class="categories sale mb-3 pb-3">15% off</div>
                                    <h3 class="item-title">Baked Products</h3>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- / Banner Blocks -->

                </div>
            </div>
        </div>
    </section>

    <section class="py-5 overflow-hidden">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                        <h2 class="section-title">Category</h2>

                        <div class="d-flex align-items-center">
                            <a href="#" class="btn-link text-decoration-none">View All Categories →</a>
                            <div class="swiper-buttons">
                                <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                                <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="category-carousel swiper">
                        <div class="swiper-wrapper">
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="frontend/images/icon-vegetables-broccoli.png" alt="Category Thumbnail">
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="frontend/images/icon-bread-baguette.png" alt="Category Thumbnail">
                                <h3 class="category-title">Breads & Sweets</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="frontend/images/icon-soft-drinks-bottle.png" alt="Category Thumbnail">
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="frontend/images/icon-wine-glass-bottle.png" alt="Category Thumbnail">
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="frontend/images/icon-animal-products-drumsticks.png" alt="Category Thumbnail">
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="frontend/images/icon-bread-herb-flour.png" alt="Category Thumbnail">
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="frontend/images/icon-vegetables-broccoli.png" alt="Category Thumbnail">
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="frontend/images/icon-vegetables-broccoli.png" alt="Category Thumbnail">
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="frontend/images/icon-vegetables-broccoli.png" alt="Category Thumbnail">
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="frontend/images/icon-vegetables-broccoli.png" alt="Category Thumbnail">
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="frontend/images/icon-vegetables-broccoli.png" alt="Category Thumbnail">
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="frontend/images/icon-vegetables-broccoli.png" alt="Category Thumbnail">
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 overflow-hidden">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header d-flex flex-wrap justify-content-between my-5">

                        <h2 class="section-title">Best selling products</h2>

                        <div class="d-flex align-items-center">
                            <a href="#" class="btn-link text-decoration-none">View All Categories →</a>
                            <div class="swiper-buttons">
                                <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
                                <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="products-carousel swiper">
                        <div class="swiper-wrapper">

                            <div class="product-item swiper-slide">
                                <span class="badge bg-success position-absolute m-3">-15%</span>
                                <div class="product-card">
                                    <div class="product-stock-badge">12000</div>
                                </div>
                                <figure>
                                    <a href="index.html" title="Product Title">
                                        <img src="frontend/images/thumb-tomatoes.png" class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <div class="product-info-line">
                                    <div class="foodmart-select-container">
                                        <label class="qty">Var :</label>
                                        <select class="foodmart-select" name="product_qty">
                                            <option value="1">Level 1</option>
                                            <option value="2">Level 2</option>
                                            <option value="3">Level 3</option>
                                            <option value="4">Level 4</option>
                                        </select>
                                    </div>
                                    <span class="price">$18.00</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="1">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- / products-carousel -->

                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="bootstrap-tabs product-tabs">
                        <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                            <h3>All Products</h3>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a href="#" class="nav-link text-uppercase fs-6 active" id="nav-all-tab"
                                        data-bs-toggle="tab" data-bs-target="#nav-all">All</a>
                                    <a href="#" class="nav-link text-uppercase fs-6" id="nav-fruits-tab"
                                        data-bs-toggle="tab" data-bs-target="#nav-fruits">Fruits & Veges</a>
                                    <a href="#" class="nav-link text-uppercase fs-6" id="nav-juices-tab"
                                        data-bs-toggle="tab" data-bs-target="#nav-juices">Juices</a>
                                </div>
                            </nav>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-all" role="tabpanel"
                                aria-labelledby="nav-all-tab">

                                <div
                                    class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

                                    <div class="col">
                                        <div class="product-item swiper-slide">
                                            <span class="badge bg-success position-absolute m-3">-15%</span>
                                            <div class="product-card">
                                                <div class="product-stock-badge">12000</div>
                                            </div>
                                            <figure>
                                                <a href="index.html" title="Product Title">
                                                    <img src="frontend/images/thumb-tomatoes.png" class="tab-image">
                                                </a>
                                            </figure>
                                            <h3>Sunstar Fresh Melon Juice</h3>
                                            <div class="product-info-line">
                                                <div class="foodmart-select-container">
                                                    <label class="qty">Var :</label>
                                                    <select class="foodmart-select" name="product_qty">
                                                        <option value="1">Level 1</option>
                                                        <option value="2">Level 2</option>
                                                        <option value="3">Level 3</option>
                                                        <option value="4">Level 4</option>
                                                    </select>
                                                </div>
                                                <span class="price">$18.00</span>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="input-group product-qty">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="quantity-left-minus btn btn-danger btn-number"
                                                            data-type="minus">
                                                            <svg width="16" height="16">
                                                                <use xlink:href="#minus"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                    <input type="text" id="quantity" name="quantity"
                                                        class="form-control input-number" value="1">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="quantity-right-plus btn btn-success btn-number"
                                                            data-type="plus">
                                                            <svg width="16" height="16">
                                                                <use xlink:href="#plus"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                </div>
                                                <a href="#" class="nav-link">Add to Cart <iconify-icon
                                                        icon="uil:shopping-cart"></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- / product-grid -->

                            </div>

                            <div class="tab-pane fade" id="nav-fruits" role="tabpanel" aria-labelledby="nav-fruits-tab">

                                <div
                                    class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

                                    <div class="col">
                                        <div class="product-item swiper-slide">
                                            <span class="badge bg-success position-absolute m-3">-15%</span>
                                            <div class="product-card">
                                                <div class="product-stock-badge">12000</div>
                                            </div>
                                            <figure>
                                                <a href="index.html" title="Product Title">
                                                    <img src="frontend/images/thumb-cucumber.png" class="tab-image">
                                                </a>
                                            </figure>
                                            <h3>Sunstar Fresh Melon Juice</h3>
                                            <div class="product-info-line">
                                                <div class="foodmart-select-container">
                                                    <label class="qty">Var :</label>
                                                    <select class="foodmart-select" name="product_qty">
                                                        <option value="1">Level 1</option>
                                                        <option value="2">Level 2</option>
                                                        <option value="3">Level 3</option>
                                                        <option value="4">Level 4</option>
                                                    </select>
                                                </div>
                                                <span class="price">$18.00</span>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="input-group product-qty">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="quantity-left-minus btn btn-danger btn-number"
                                                            data-type="minus">
                                                            <svg width="16" height="16">
                                                                <use xlink:href="#minus"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                    <input type="text" id="quantity" name="quantity"
                                                        class="form-control input-number" value="1">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="quantity-right-plus btn btn-success btn-number"
                                                            data-type="plus">
                                                            <svg width="16" height="16">
                                                                <use xlink:href="#plus"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                </div>
                                                <a href="#" class="nav-link">Add to Cart <iconify-icon
                                                        icon="uil:shopping-cart"></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- / product-grid -->

                            </div>
                            <div class="tab-pane fade" id="nav-juices" role="tabpanel" aria-labelledby="nav-juices-tab">

                                <div
                                    class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

                                    <div class="col">
                                        <div class="product-item swiper-slide">
                                            <span class="badge bg-success position-absolute m-3">-15%</span>
                                            <div class="product-card">
                                                <div class="product-stock-badge">12000</div>
                                            </div>
                                            <figure>
                                                <a href="index.html" title="Product Title">
                                                    <img src="frontend/images/thumb-milk.png" class="tab-image">
                                                </a>
                                            </figure>
                                            <h3>Sunstar Fresh Melon Juice</h3>
                                            <div class="product-info-line">
                                                <div class="foodmart-select-container">
                                                    <label class="qty">Var :</label>
                                                    <select class="foodmart-select" name="product_qty">
                                                        <option value="1">Level 1</option>
                                                        <option value="2">Level 2</option>
                                                        <option value="3">Level 3</option>
                                                        <option value="4">Level 4</option>
                                                    </select>
                                                </div>
                                                <span class="price">$18.00</span>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="input-group product-qty">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="quantity-left-minus btn btn-danger btn-number"
                                                            data-type="minus">
                                                            <svg width="16" height="16">
                                                                <use xlink:href="#minus"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                    <input type="text" id="quantity" name="quantity"
                                                        class="form-control input-number" value="1">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="quantity-right-plus btn btn-success btn-number"
                                                            data-type="plus">
                                                            <svg width="16" height="16">
                                                                <use xlink:href="#plus"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                </div>
                                                <a href="#" class="nav-link">Add to Cart <iconify-icon
                                                        icon="uil:shopping-cart"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- / product-grid -->

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
