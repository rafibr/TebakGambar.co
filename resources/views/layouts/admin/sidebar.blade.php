<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <brand-component></brand-component>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/images/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block" href="#">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <router-link tag="a" to="/home" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </router-link>
                </li>
                @if (Auth::user()->level == 99)
                    <li class="nav-item">
                        <router-link tag="a" to="/user" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Users</p>
                        </router-link>
                    </li>
                @endif
                @if (Auth::user()->level != 99)
                    <li class="nav-item">
                        <router-link tag="a" to="/user/{{ Auth::user()->id }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Profile</p>
                        </router-link>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
