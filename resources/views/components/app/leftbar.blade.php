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
                <li class="{{ Route::is('home') ? 'mm-active' : '' }}">
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class="uil-tachometer-fast"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Route::is('branch.index','branch.create','branch.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('branch.index') }}" class="waves-effect">
                        <i class="uil-map-pin-alt"></i>
                        <span>Branch</span>
                    </a>
                </li>
                <li class="{{ Route::is('room.index','room.create','room.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('room.index') }}" class="waves-effect">
                        <i class="uil-key-skeleton-alt"></i>
                        <span>Room</span>
                    </a>
                </li>
                <li class="{{ Route::is('booking.index','booking.create','booking.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('booking.index') }}" class="waves-effect">
                        <i class="uil-book-open"></i>
                        <span>Booking</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
