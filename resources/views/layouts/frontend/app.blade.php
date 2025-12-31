<!DOCTYPE html>
<html lang="en">

<head>
    <title>Im Bassing Restourant</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="icon" href="{{ asset('backend/assets/images/jas.jfif') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body>

    {{-- Alert Flash --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


    <div class="preloader-wrapper">
        <div class="preloader"></div>
    </div>

    @include('layouts.frontend.cart')

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch"
        aria-labelledby="Search">
        <div class="offcanvas-header justify-content-center">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Search</span>
                </h4>
                <form role="search" action="index.html" method="get" class="d-flex mt-3 gap-0">
                    <input class="form-control rounded-start rounded-0 bg-light" type="email"
                        placeholder="What are you looking for?" aria-label="What are you looking for?">
                    <button class="btn btn-dark rounded-end rounded-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

    <header>
        <div class="container-fluid">
            <div class="row py-3 border-bottom">
                <div class="col-sm-4 col-lg-3 text-center text-sm-start">
                    <div class="main-logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('frontend/images/Resto.png') }}" alt="logo" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block"></div>

                <div class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
                    <div class="cart text-end d-none d-lg-block dropdown">
                        <button class="border-0 bg-transparent d-flex flex-column gap-2 lh-1" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                            <span class="fs-6 text-muted dropdown-toggle">Table</span>
                            <span class="cart-total fs-5 fw-bold">Cart</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    @include('layouts.frontend.footer')

    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
    
    <script src="{{ asset('frontend/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
</body>

<style>

    .product-card {
    position: relative;
    font-family: 'Arial', sans-serif;
}

.product-stock-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background-color: #fff;
    border: 1px solid #ddd;
    color: #555;
    width: 80px;
    height: 35px;
    border-radius: 10%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 600;
    line-height: 1;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
}

.foodmart-select-container {
    display: inline-block;
    position: relative;
    margin-right: 15px;
    vertical-align: middle;
}

.foodmart-select {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 3px 20px 3px 8px;
    font-size: 13px;
    color: #555;
    cursor: pointer;
    line-height: 1.2;
    height: auto;
    transition: border-color 0.2s, box-shadow 0.2s;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    width: auto;
}

.foodmart-select:hover {
    border-color: #ccc;
}

.foodmart-select:focus {
    border-color: #989898;
    outline: none;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

/* PERBAIKAN: Mengubah .qty menjadi inline-block agar sejajar dengan select */
.qty {
    display: inline-block;
    font-size: 13px;
    color: #555;
    font-weight: 500;
    margin-bottom: 0;
    margin-right: 5px; 
    vertical-align: middle;
}

.foodmart-select-container::after {
    content: '▼';
    position: absolute;
    top: 50%;
    right: 6px;
    transform: translateY(-50%);
    font-size: 8px;
    color: #888;
    pointer-events: none;
}

/* CSS untuk Textarea (dipertahankan dari sebelumnya) */
ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

li {
    margin-bottom: 20px;
}

.foodmart-form-group {
    padding: 0 5px;
    font-family: 'Arial', sans-serif;
}

.foodmart-form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #333;
}

.foodmart-form-group textarea {
    width: 100%;
    box-sizing: border-box;
    padding: 10px 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 14px;
    color: #555;
    background-color: #fff;
    transition: border-color 0.3s, box-shadow 0.3s;
    resize: vertical;
}

.foodmart-form-group textarea:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
    outline: none;
}

.foodmart-form-group textarea::placeholder {
    color: #aaa;
    font-style: italic;
}

.foodmart-form-group textarea::-webkit-resizer {
    border-color: transparent #aaa #aaa transparent;
    border-style: solid;
    border-width: 5px;
}

.foodmart-form-group textarea {
    -moz-appearance: none;
}
</style>
</html>
