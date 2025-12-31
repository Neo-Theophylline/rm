@extends('layouts.backend.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <a href="{{ route('table.create') }}" style="float:right;">Add data</a>

                <h5 class="card-title">Table List</h5>

                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Table Name</th>
                                <th>Floor</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th style="text-align:center;width:140px;">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tables as $table)
                                <tr>
                                    <td>{{ ($tables->currentPage() - 1) * $tables->perPage() + $loop->iteration }}</td>
                                    <td>{{ $table->table_name }}</td>
                                    <td>{{ $table->floor }}</td>
                                    <td>{{ ucfirst($table->status) }}</td>
                                    <td>{{ ucfirst($table->type) }}</td>
                                    <td style="text-align:center">
                                        <div class="d-flex justify-content-center gap-1">

                                            <a href="{{ route('table.edit', $table) }}"
                                               class="btn btn-outline-warning btn-sm">
                                                Edit
                                            </a>

                                            <form id="delete-form-{{ $table->id }}"
                                                  action="{{ route('table.destroy', $table) }}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button"
                                                        class="btn btn-outline-danger btn-sm delete-btn"
                                                        data-id="{{ $table->id }}">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">
                                        No table found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $tables->links() }}

            </div>
        </div>
    </div>
</div>

{{-- SWEET ALERT --}}
<script>
document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        let id = this.dataset.id;

        Swal.fire({
            title: 'Delete table?',
            text: 'Data tidak bisa dikembalikan',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Delete',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    });
});
</script>
@endsection
