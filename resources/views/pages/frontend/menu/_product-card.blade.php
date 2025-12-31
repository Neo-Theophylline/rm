<style>
    
/* ================= BASE PRODUCT CARD ================= */
.product-item {
    width: 100%;
    display: flex;
    flex-direction: column;
    border-radius: 22px;
    padding: 18px;
    background: #ffffff;
    border: 1px solid #e5e5e5;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}
.product-item:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 30px rgba(0,0,0,0.1);
}

/* ================= PREMIUM CARD ================= */
.product-premium {
    background: linear-gradient(135deg, #FFF9E5, #FFF4CC);
    border: 1px solid #F3E0A3;
}
.product-premium:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 50px rgba(255, 193, 7, 0.35);
    border-color: #FFC107;
}
.product-premium::after {
    content: "";
    position: absolute;
    top: 0;
    left: -120%;
    width: 60%;
    height: 100%;
    background: linear-gradient(to right, transparent, rgba(255,255,255,0.55), transparent);
    transition: 0.7s;
}
.product-premium:hover::after {
    left: 120%;
}

/* ================= IMAGE ================= */
.product-item figure {
    width: 100%;
    height: 220px;
    margin: 0;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid #eee;
}
.product-item figure img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* ================= STOCK BADGE ================= */
.product-stock-badge {
    position: absolute;
    top: 18px;
    right: 18px;
    padding: 6px 14px;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 1px;
}
.product-premium .product-stock-badge {
    background: #fff6c9;
    color: #C9A227;
}
.product-item:not(.product-premium) .product-stock-badge {
    background: rgba(160,160,160,0.8);
    color: #fff;
}

/* ================= TITLE ================= */
.product-title-regular {
    font-family: 'Playfair Display', serif;
    font-size: 1.35rem;
    margin-top: 16px;
    color: #212529;
}
.product-title-premium {
    font-family: 'Playfair Display', serif;
    font-size: 1.35rem;
    margin-top: 16px;
    color: #C9A227;
}

/* ================= PRICE ================= */
.price-regular {
    color: #212529;
    font-weight: 600;
}
.price-premium {
    color: #C9A227;
    font-weight: 800;
    letter-spacing: 0.6px;
    font-size: 1.1rem;
}

/* ================= INPUT & SELECT (NO BLUE) ================= */
.product-premium select,
.product-premium input {
    background: #FFFDF5;
    border: 1px solid #E6C97A;
    color: #8B7222;
}
.product-premium select:focus,
.product-premium input:focus {
    border-color: #C9A227;
    box-shadow: 0 0 0 0.2rem rgba(201,162,39,.35);
}
.product-premium select option {
    background: #FFFDF5;
    color: #8B7222;
}
/* ================= BUTTON ================= */
.btn-premium {
    border: 1px solid #C9A227;
    color: #C9A227;
    background: transparent;
    font-weight: 700;
    letter-spacing: 1px;
}
.btn-premium:hover {
    background: linear-gradient(135deg, #C9A227, #FFD700);
    color: #fff;
}
</style>

@php
$isPremium = $cart->table->type === 'premium';
$displayPrice = $product->price;
if($isPremium) {
    // Tambahkan 1 digit "0" di belakang, misal kali 10
    $displayPrice = $product->price * 10;
}
@endphp

<div class="col">
    <div class="product-item {{ $isPremium ? 'product-premium' : '' }}">
        <div class="product-stock-badge">
            {{ $product->stock }}
        </div>

        <figure>
            <img src="{{ asset('storage/' . $product->image) }}">
        </figure>

        <h3 class="{{ $isPremium ? 'product-title-premium' : 'product-title-regular' }}">
            {{ $product->name }}
        </h3>

        <div class="{{ $isPremium ? 'price-premium' : 'price-regular' }}">
            Rp {{ number_format($displayPrice) }}
        </div>

        <form method="POST" action="{{ route('cart.add') }}" class="mt-3">
            @csrf

            @if ($product->variants->count())
                <select class="form-select mb-2" name="product_variant_id">
                    @foreach ($product->variants as $variant)
                        @php
                            $variantPrice = $variant->extra_price;
                            if($isPremium) $variantPrice = $variantPrice * 10; // tambah premium
                        @endphp
                        <option value="{{ $variant->id }}">
                            {{ $variant->name }}
                        </option>
                    @endforeach
                </select>
            @endif

            <input type="number" name="qty" value="1" min="1" class="form-control mb-2">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="cart_id" value="{{ session('cart_id') }}">
            <input type="hidden" name="is_premium" value="{{ $isPremium ? 1 : 0 }}"> {{-- Kirim flag ke backend --}}

            <button class="btn {{ $isPremium ? 'btn-premium' : 'btn-primary' }} w-100">
                ADD TO CART
            </button>
        </form>
    </div>
</div>
