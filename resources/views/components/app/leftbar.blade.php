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
                <li class="{{ Route::is('branch.index','branch.create','branch.edit','branch.view') ? 'mm-active' : '' }}">
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
                <li class="{{ Route::is('namelist.index','namelist.create','namelist.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('namelist.index') }}" class="waves-effect">
                        <i class="uil-users-alt"></i>
                        <span>Name List</span>
                    </a>
                </li>
                <li class="menu-title">Account</li>
                <li class="{{ Route::is('booking.index','booking.create','booking.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('booking.index') }}" class="waves-effect">
                        <i class="uil-book-open"></i>
                        <span>Booking</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                    <a href="{{ route('booking.dailycheckout') }}" class="waves-effect">
                                        <i class="uil-user-circle"></i>
                                        <span>Daily Checkout</span>
                                    </a>
                                    </li>
                                </ul>
                </li>
                <li class="{{ Route::is('income.index','income.create','income.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('income.index') }}" class="waves-effect">
                        <i class="uil-money-withdraw"></i>
                        <span>Income</span>
                    </a>
                </li>
                <li class="{{ Route::is('expense.index','expense.create','expense.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('expense.index') }}" class="waves-effect">
                        <i class="uil-money-insert"></i>
                        <span>Expense</span>
                    </a>
                </li>
                <li class="{{ Route::is('openaccount.index','openaccount.create','openaccount.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('openaccount.index') }}" class="waves-effect">
                        <i class="uil-lock-open-alt"></i>
                        <span>Open Account</span>
                    </a>
                </li>
                <li class="{{ Route::is('closeaccount.index','closeaccount.create','closeaccount.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('closeaccount.index') }}" class="waves-effect">
                        <i class="uil-lock-alt"></i>
                        <span>Close Account</span>
                    </a>
                </li>
                <li class="{{ Route::is('contact.index') ? 'mm-active' : '' }}">
                    <a href="{{ route('contact.index') }}" class="waves-effect">
                        <i class="uil-mailbox"></i>
                        <span>Contact Us</span>
                    </a>
                </li>
                <li class="{{ Route::is('feedback.index') ? 'mm-active' : '' }}">
                    <a href="{{ route('feedback.index') }}" class="waves-effect">
                        <i class="uil-feedback"></i>
                        <span>Feed Back</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
