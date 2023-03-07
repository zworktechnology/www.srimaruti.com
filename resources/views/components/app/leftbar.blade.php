<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="javascript:void(0);" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/backend/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/backend/images/logo-dark.png') }}" alt="" height="20">
            </span>
        </a>

        <a href="javascript:void(0);" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/backend/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/backend/images/logo-light.png') }}" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar="" class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li class="mm-active">
                    <a href="{{ route('home') }}" class="waves-effect active">
                        <i class="uil-tachometer-fast"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
