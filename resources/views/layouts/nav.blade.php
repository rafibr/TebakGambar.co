<!-- Navbar -->
<nav class="main-header navbar navbar-xl navbar-expand-xl navbar-dark">
    <div class="container">
        <a href="{{ url('home') }}" class="navbar-brand">
            <img src="{{ asset('assets/33.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text">TebakGambar.co</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ url('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('profile/' . Auth::user()->id) }}"
                        class="nav-link {{ Request::segment(1) == 'profile' ? 'active' : '' }}">Profile</a>
                </li>

                @if (Auth::user()->level == 99)

                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"
                            class="nav-link dropdown-toggle
                            {{ Request::is('cabang') || Request::is('cabang') || Request::is('validasi') || Request::is('dompet') ? 'active' : '' }}">
                            Admin
                            Menu</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                            style="left: 0px; right: inherit;">

                            <li class="nav-item">
                                <a href="{{ url('cabang') }}"
                                    class="nav-link {{ Request::is('cabang') ? 'active' : '' }}">Cabang</a>
                            </li>

                            <li class="dropdown-divider"></li>

                            <li class="nav-item">
                                <a href="{{ url('dompet') }}"
                                    class="nav-link {{ Request::is('dompet') ? 'active' : '' }}">Dompet Digital</a>
                            </li>

                        </ul>
                    </li>

                @endif
            </ul>

        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->
