@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bill</h5>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">invoice</th>
                                    <th scope="col">total cost</th>
                                    <th scope="col">payment method</th>
                                    <th scope="col">status paid</th>
                                    <th scope="col" style="text-align: center; width: 120px;">option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bills as $bill)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>

                                        <td>INV-{{ str_pad($bill->id, 5, '0', STR_PAD_LEFT) }}</td>

                                        <td>Rp. {{ number_format($bill->total, 0, ',', '.') }}</td>

                                        <td>Cash</td>

                                        <td>
                                            @if ($bill->status === 'paid')
                                                <span class="badge bg-success">Paid</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Unpaid</span>
                                            @endif
                                        </td>

                                        <td style="text-align:center">
                                            <div class="buttons d-flex justify-content-center" style="gap:6px">

                                                <a href="{{ route('bill.show', $bill->id) }}"
                                                    class="btn btn-outline-secondary btn-sm">
                                                    Detail
                                                </a>

                                                <form id="delete-form-{{ $bill->id }}"
                                                    action="{{ route('bill.destroy', $bill->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" class="btn btn-outline-danger btn-sm delete-btn"
                                                        data-id="{{ $bill->id }}">
                                                        Delete
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">
                                            No bills found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-3 d-flex justify-content-end">
                            {{ $bills->links('pagination::bootstrap-5') }}
                        </div>
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
                    title: "Delete bill?",
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
