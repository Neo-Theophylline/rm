<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
    <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <div class="order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Cart</span>
                <span class="badge bg-primary rounded-pill">{{ $cart?->items->sum('qty') ?? 0 }}</span>
            </h4>

            <ul class="list-group mb-3">
                @if ($cart && $cart->items->count())
                    @foreach ($cart->items as $item)
                        @php
                            $isPremium = $cart->table->type === 'premium';
                        @endphp
                        <li class="list-group-item d-flex justify-content-between align-items-center cart-item {{ $isPremium ? 'premium-cart' : '' }}" data-id="{{ $item->id }}">
                            <div>
                                <strong class="{{ $isPremium ? 'text-gold' : '' }}">{{ $item->product->name }}</strong><br>
                                @if ($item->variant)
                                    <small class="{{ $isPremium ? 'text-gold' : '' }}">{{ $item->variant->name }}</small>
                                @endif
                                <div class="d-flex gap-1 mt-1">
                                    <button class="btn btn-sm {{ $isPremium ? 'btn-outline-warning' : 'btn-outline-secondary' }} cart-btn" data-action="decrease">−</button>
                                    <span class="qty">{{ $item->qty }}</span>
                                    <button class="btn btn-sm {{ $isPremium ? 'btn-outline-warning' : 'btn-outline-secondary' }} cart-btn" data-action="increase">+</button>
                                    <button class="btn btn-sm {{ $isPremium ? 'btn-outline-warning' : 'btn-outline-danger' }} cart-btn" data-action="remove">🗑</button>
                                </div>
                            </div>
                            <span class="price {{ $isPremium ? 'text-gold' : '' }}">
                                Rp {{ number_format($item->price * $item->qty) }}
                            </span>
                        </li>
                    @endforeach

                    <li class="list-group-item d-flex justify-content-between {{ $isPremium ? 'premium-cart' : '' }}">
                        <span>Total</span>
                        <strong class="{{ $isPremium ? 'text-gold' : '' }}">
                            Rp {{ number_format($cart->items->sum(fn($i) => $i->price * $i->qty)) }}
                        </strong>
                    </li>
                @else
                    <li class="list-group-item text-center text-muted">
                        Nothing in cart
                    </li>
                @endif
            </ul>

            @if ($cart && $cart->items->count())
            <form method="POST" action="{{ route('cart.order') }}">
                @csrf
                <div class="foodmart-form-group mb-3">
                    <h5><label class="text-primary">Note</label></h5>
                    <textarea name="note" rows="4" class="form-control" placeholder="Catatan pesanan..."></textarea>
                </div>
                <button class="w-100 btn {{ $isPremium ? 'btn-premium' : 'btn-primary' }} btn-lg mt-2">Order</button>
            </form>
            @endif
        </div>
    </div>
</div>

<style>
/* PREMIUM CART STYLING */
.premium-cart {
    background-color: #FFF9E5;
}
.text-gold {
    color: #C9A227 !important;
}
.premium-cart .btn-outline-warning {
    border-color: #C9A227;
    color: #C9A227;
}
.premium-cart .btn-outline-warning:hover {
    background: linear-gradient(135deg, #C9A227, #FFD700);
    color: #fff;
}
.premium-cart .badge {
    background-color: #C9A227;
    color: #fff;
}
.btn-premium {
    border: 1px solid #C9A227;
    color: #C9A227;
    background: transparent;
    font-weight: 700;
}
.btn-premium:hover {
    background: linear-gradient(135deg, #C9A227, #FFD700);
    color: #fff;
}
</style>

<script>
document.querySelectorAll('.cart-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        let item = this.closest('.cart-item');
        let id = item.dataset.id;
        let action = this.dataset.action;

        fetch("{{ route('cart.ajax') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                cart_item_id: id,
                action: action
            })
        })
        .then(res => res.json())
        .then(() => location.reload())
        .catch(err => console.error(err));
    });
});
</script>
