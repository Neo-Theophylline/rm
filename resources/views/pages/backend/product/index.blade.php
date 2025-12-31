@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('product.create') }}" style="float: right;">Add data</a>
                    <h5 class="card-title">Small Table</h5>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">stock</th>
                                    <th scope="col">price</th>
                                    <th scope="col" style="text-align: center; width: 120px;">option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <th scope="row">
                                            {{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}
                                        </th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>

                                        <td style="text-align: center;">
                                            <div class="buttons d-flex justify-content-center" style="gap: 6px;">
                                                <a href="{{ route('product.show', $product->id) }}"
                                                    class="btn btn-outline-secondary btn-sm">Detail</a>

                                                <a href="{{ route('product.edit', $product->id) }}"
                                                    class="btn btn-outline-warning btn-sm">Edit</a>

                                                <a href="{{ route('product.variants.index', $product) }}"
                                                    class="btn btn-outline-warning btn-sm">Variants</a>

                                                <form id="delete-form-{{ $product->id }}"
                                                    action="{{ route('product.destroy', $product->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" class="btn btn-outline-danger btn-sm delete-btn"
                                                        data-id="{{ $product->id }}">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No product found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- sweet alert pisan --}}
    <script>
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                let id = this.getAttribute('data-id');

                Swal.fire({
                    title: "Delete product?",
                    text: "Are you sure?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Delete!",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            });
        });
    </script>
@endsection
