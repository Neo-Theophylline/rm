<style>
    /* ===============================
   NAVBAR USER AVATAR (ANTI GEPENG)
================================ */

    /* avatar kecil di navbar */
    .user-profile img {
        width: 35px;
        height: 35px;

        border-radius: 50%;
        object-fit: cover;
        object-position: center;

        display: block;
        max-width: none;
    }

    /* avatar di dropdown */
    .user-details .avatar img {
        width: 50px;
        height: 50px;

        border-radius: 50%;
        object-fit: cover;
        object-position: center;

        display: block;
        max-width: none;
    }
</style>
<!--Start topbar header-->
<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="javascript:void();">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <form class="search-bar">
                    <input type="text" class="form-control" placeholder="Enter keywords">
                    <a href="javascript:void();"><i class="icon-magnifier"></i></a>
                </form>
            </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                    <span class="user-profile"><img
                            src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('backend/assets/images/nguwawor.jpg') }}"
                            class="img-circle" alt="user avatar"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item">
                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0"
                                style="color: inherit; text-decoration: none;">
                                <i class="icon-power mr-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<!--End topbar header-->
