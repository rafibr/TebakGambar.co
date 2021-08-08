<!-- Navbar -->
<nav class="main-header navbar navbar-xl navbar-expand-xl navbar-dark">
    <div class="container">
        <a href="{{ url('home') }}" class="navbar-brand">
            <img src="{{ asset('assets/33.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">TebakGambar.co</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item font-weight-bold">
                    <a href="{{ url('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">Home</a>
                </li>
                @if (Auth::user()->level == 99)
                    <li class="nav-item font-weight-bold">
                        <a href="{{ url('cabang') }}"
                            class="nav-link {{ Request::is('cabang')||Request::is('profile') ? 'active' : '' }}">Cabang</a>
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
