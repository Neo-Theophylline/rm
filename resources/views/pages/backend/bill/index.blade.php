@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Small Table</h5>
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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>INV-001</td>
                                    <td>Rp.30.000</td>
                                    <td>Cash</td>
                                    <td>Unpaid</td>
                                    <td>
                                        <div class="buttons">
                                            <a href="/billshow" class="btn btn-outline-secondary btn-sm">Detail</a>
                                            <a href="#" class="btn btn-outline-danger delete-btn btn-sm"
                                                data-id="1">Delete</a>
                                        </div>
                                    </td>
                                </tr>
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
