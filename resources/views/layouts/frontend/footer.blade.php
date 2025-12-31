<footer class="py-4 bg-white border-top">
    <div class="container">
        <div class="row align-items-center">

            {{-- Profile --}}
            <div class="col-md-6 d-flex align-items-center gap-3">
                @auth
                    <img src="{{ auth()->user()->image
                        ? asset('storage/' . auth()->user()->image)
                        : asset('backend/assets/images/nguwawor.jpg') }}"
                        class="rounded-circle border"
                        width="55"
                        height="55"
                        alt="Profile">
                @endauth

                <div>
                    <h6 class="mb-0 fw-bold text-dark">Waiter Cafe</h6>
                    <small class="text-muted">waiter@gmail.com</small><br>
                    <span class="badge bg-warning text-dark mt-1">WAITER</span>
                </div>
            </div>

            {{-- Logo + Logout --}}
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <img src="{{ asset('frontend/images/logo.png') }}"
                    alt="Logo"
                    height="40"
                    class="mb-2">

                <div>
                    @auth
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-warning text-dark fw-semibold">
                            Logout
                        </button>
                    </form>
                    @endauth
                </div>
            </div>

        </div>

        <hr class="my-3">

        <div class="text-center small text-muted">
            © 1945 Kelompok Hebat All rights reserved.
        </div>
    </div>
</footer>
