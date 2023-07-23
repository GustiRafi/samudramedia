<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Home</div>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ route('profile') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Profile
                </a>
                <div class="sb-sidenav-menu-heading">Menu</div>
                {{-- <a class="nav-link" href="{{ route('sosmed.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-link"></i></div>
                    Media Sosial
                </a> --}}
                <a class="nav-link" href="{{ route('categori.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Categories
                </a>
                <a class="nav-link" href="{{ route('book.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Book
                </a>
                <a class="nav-link" href="{{ route('journal.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Journal
                </a>
                <a class="nav-link" href="{{ route('service.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-bell-concierge"></i></div>
                    Service
                </a>
                <a class="nav-link" href="{{ route('email.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                    email  <span class="badge bg-primary m-2">{{ App\Models\inbox::all()->where('status', 'terkirim')->count() }}</span>
                </a>
                {{-- <a class="nav-link" href="/dashboard/intro">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Introduction
                </a>
                <a class="nav-link" href="/dashboard/about">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    About
                </a>
                <a class="nav-link" href="/dashboard/sosmed">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Sosial Media
                </a>
                <a class="nav-link" href="/dashboard/alamat">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Address
                </a>
                <a class="nav-link" href="/dashboard/contact">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Contact
                </a>
                <a class="nav-link" href="/dashboard/skill">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    My Skill
                </a>
                <a class="nav-link" href="/dashboard/project">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    My Project
                </a>
                <a class="nav-link" href="/dashboard/certificate">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Certificate
                </a> --}}
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ auth()->user()->name }}
        </div>
    </nav>
</div>