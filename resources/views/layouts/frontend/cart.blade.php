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
                        <li class="list-group-item d-flex justify-content-between align-items-center cart-item"
                            data-id="{{ $item->id }}">

                            <div>
                                <strong>{{ $item->product->name }}</strong><br>

                                @if ($item->variant)
                                    <small>{{ $item->variant->name }}</small>
                                @endif

                                <div class="d-flex gap-1 mt-1">
                                    <button class="btn btn-sm btn-outline-secondary cart-btn" data-action="decrease">−</button>
                                    <span class="qty">{{ $item->qty }}</span>
                                    <button class="btn btn-sm btn-outline-secondary cart-btn" data-action="increase">+</button>
                                    <button class="btn btn-sm btn-outline-danger cart-btn" data-action="remove">🗑</button>
                                </div>
                            </div>

                            <span class="price">
                                Rp {{ number_format($item->price * $item->qty) }}
                            </span>
                        </li>
                    @endforeach

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong>
                            Rp {{ number_format($cart->items->sum(fn($i) => $i->price * $i->qty)) }}
                        </strong>
                    </li>
                @else
                    <li class="list-group-item text-center text-muted">
                        Nothing in cart
                    </li>
                @endif

                <li>
                    <div class="foodmart-form-group">
                        <h5><label class="text-primary">Note Cnh:</label></h5>
                        <textarea id="catatan-tambahan" name="catatan-tambahan" rows="4"></textarea>
                    </div>
                </li>
            </ul>

            <button class="w-100 btn btn-primary btn-lg" disabled type="submit">Order</button>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.cart-btn').forEach(btn => {
    btn.addEventListener('click', function () {
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
        .then(() => location.reload());
    });
});
</script>
