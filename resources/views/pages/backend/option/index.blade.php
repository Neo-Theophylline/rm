@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('option.create') }}" style="float: right;">Add data</a>
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

                                @foreach ($options as $index => $option)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $option->name }}</td>
                                        <td>{{ $option->stock }}</td>
                                        <td>Rp.{{ number_format($option->price, 0, ',', '.') }}</td>
                                        <td>
                                            <div class="buttons">
                                                <a href="{{ route('option.edit', $option->id) }}"
                                                    class="btn btn-outline-warning btn-sm">Edit</a>

                                                <a href="#" class="btn btn-outline-danger delete-btn btn-sm"
                                                    data-id="{{ $option->id }}">Delete</a>

                                                {{-- HIDDEN DELETE FORM --}}
                                                <form id="delete-form-{{ $option->id }}"
                                                    action="{{ route('option.destroy', $option->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

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
                    title: "Delete option?",
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
