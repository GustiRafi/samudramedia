<nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3">Samudra Media</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <div class="nav-item">
            <form action="{{ route('logout') }}" class="d-inline" method="post">
                @csrf
                <button type="submit"
                    class="btn btn-link btn-sm text-white text-decoration-none order-1 order-lg-0 me-4 me-lg-0"
                    onclick="return confirm('Are you sure to logout')">Logout</button>
            </form>
        </div>
    </ul>
</nav>