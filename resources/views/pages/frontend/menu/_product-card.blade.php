<style>
    .product-item {
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    /* container gambar */
    .product-item figure {
        width: 100%;
        height: 210px;
        /* 🔥 KUNCI TINGGI */
        margin: 0;
        overflow: hidden;
        border-radius: 12px;
        background: #f5f5f5;
        /* fallback kalau gambar kecil */
    }

    /* gambar */
    .product-item figure img.tab-image {
        width: 100%;
        height: 100%;
        /* 🔥 PENTING */
        object-fit: cover;
        /* konsisten & rapi */
        object-position: center;
        display: block;
    }
</style>
<div class="col">
    <div class="product-item">

        <div class="product-card">
            <div class="product-stock-badge">
                Stock {{ $product->stock }}
            </div>
        </div>

        <figure>
            <img src="{{ asset('storage/' . $product->image) }}" class="tab-image">
        </figure>

        <h3>{{ $product->name }}</h3>

        <form method="POST" action="{{ route('cart.add') }}">
            @csrf
            @if ($product->variants->count())
                <select class="form-select mb-2" name="product_variant_id">
                    @foreach ($product->variants as $variant)
                        <option value="{{ $variant->id }}">
                            {{ $variant->name }}
                            @if ($variant->price > 0)
                                (+{{ number_format($variant->price) }})
                            @endif
                        </option>
                    @endforeach
                </select>
            @endif

            <input type="number" class="form-control mb-2" name="qty" value="1" min="1">
            <input type="hidden" name="cart_id" value="{{ $cart->id }}">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button class="btn btn-primary w-100">Add to Cart</button>
        </form>


    </div>
</div>
