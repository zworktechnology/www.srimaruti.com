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
                <li class="{{ Route::is('home', 'homepage.data.filter') ? 'mm-active' : '' }}">
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class="uil-tachometer-fast"></i>
                        <span>{{ __('messages.dashboard_title') }}</span>
                    </a>
                </li>
                <li class="{{ Route::is('booking.index','booking.create','booking.edit','booking.view','booking.today','booking.upcoming','booking.missingout') ? 'mm-active' : '' }}">
                    <a href="javascript: void(0);" class="waves-effect {{ Route::is('booking.index','booking.create','booking.edit', 'booking.view') ? 'mm-active' : '' }}">
                        <i class="uil-store"></i>
                        <span>{{ __('messages.booking_title') }}</span>
                    </a>
                    <ul class="sub-menu {{ Route::is('booking.create','booking.edit','booking.view', 'booking.datefilter') ? 'mm-collapse' : '' }} {{ Route::is('booking.index', 'booking.today', 'booking.upcoming', 'booking.missingout', 'booking.datefilter') ? 'mm-show' : '' }}" aria-expanded="false">
                        <li class="{{ Route::is('booking.index','booking.today','booking.upcoming','booking.missingout','booking.create', 'booking.datefilter') && request()->route('user_branch_id') == 1 ? 'mm-active' : '' }}"><a href="{{ route('booking.index', ['user_branch_id' => '1']) }}">{{ __('messages.sreerangam_title') }}</a></li>
                        <li class="{{ Route::is('booking.index','booking.today','booking.upcoming','booking.missingout','booking.create', 'booking.datefilter') && request()->route('user_branch_id') == 2 ? 'mm-active' : '' }}"><a href="{{ route('booking.index', ['user_branch_id' => '2']) }}">{{ __('messages.samayapuram_title') }}</a></li>
                        <li class="{{ Route::is('booking.index','booking.today','booking.upcoming','booking.missingout','booking.create', 'booking.datefilter') && request()->route('user_branch_id') == 3 ? 'mm-active' : '' }}"><a href="{{ route('booking.index', ['user_branch_id' => '3']) }}">{{ __('messages.gunaseelam_title') }}</a></li>
                    </ul>
                </li>
                <li class="{{ Route::is('namelist.index','namelist.create','namelist.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('namelist.index') }}" class="waves-effect">
                        <i class="uil-users-alt"></i>
                        <span>I/E Master</span>
                    </a>
                </li>
                <li class="{{ Route::is('income.index','income.create','income.edit', 'income.datefilter') ? 'mm-active' : '' }}">
                    <a href="javascript: void(0);" class="waves-effect {{ Route::is('income.index','income.create','income.edit') ? 'mm-active' : '' }}">
                        <i class="uil-money-withdraw"></i>
                        <span>{{ __('messages.otherincome_title') }}</span>
                    </a>
                    <ul class="sub-menu {{ Route::is('income.create','income.edit', 'income.datefilter') ? 'mm-collapse' : '' }} {{ Route::is('income.index', 'income.datefilter') ? 'mm-show' : '' }}" aria-expanded="false">
                        <li class="{{ Route::is('income.index', 'income.datefilter') && request()->route('user_branch_id') == 1 ? 'mm-active' : '' }}"><a href="{{ route('income.index', ['user_branch_id' => '1']) }}">{{ __('messages.sreerangam_title') }}</a></li>
                        <li class="{{ Route::is('income.index', 'income.datefilter') && request()->route('user_branch_id') == 2 ? 'mm-active' : '' }}"><a href="{{ route('income.index', ['user_branch_id' => '2']) }}">{{ __('messages.samayapuram_title') }}</a></li>
                        <li class="{{ Route::is('income.index', 'income.datefilter') && request()->route('user_branch_id') == 3 ? 'mm-active' : '' }}"><a href="{{ route('income.index', ['user_branch_id' => '3']) }}">{{ __('messages.gunaseelam_title') }}</a></li>
                    </ul>
                </li>
                <li class="{{ Route::is('expense.index','expense.create','expense.edit','expense.datefilter') ? 'mm-active' : '' }}">
                    <a href="javascript: void(0);" class="waves-effect {{ Route::is('expense.index','expense.create','expense.edit', 'expense.datefilter') ? 'mm-active' : '' }}">
                        <i class="uil-money-withdraw"></i>
                        <span>{{ __('messages.expense_title') }}</span>
                    </a>
                    <ul class="sub-menu {{ Route::is('expense.create','expense.edit', 'expense.datefilter') ? 'mm-collapse' : '' }} {{ Route::is('expense.index', 'expense.datefilter') ? 'mm-show' : '' }}" aria-expanded="false">
                        <li class="{{ Route::is('expense.index', 'expense.datefilter') && request()->route('user_branch_id') == 1 ? 'mm-active' : '' }}"><a href="{{ route('expense.index', ['user_branch_id' => '1']) }}">{{ __('messages.sreerangam_title') }}</a></li>
                        <li class="{{ Route::is('expense.index', 'expense.datefilter') && request()->route('user_branch_id') == 2 ? 'mm-active' : '' }}"><a href="{{ route('expense.index', ['user_branch_id' => '2']) }}">{{ __('messages.samayapuram_title') }}</a></li>
                        <li class="{{ Route::is('expense.index', 'expense.datefilter') && request()->route('user_branch_id') == 3 ? 'mm-active' : '' }}"><a href="{{ route('expense.index', ['user_branch_id' => '3']) }}">{{ __('messages.gunaseelam_title') }}</a></li>
                    </ul>
                </li>
                <li class="{{ Route::is('openaccount.index','openaccount.create','openaccount.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('openaccount.index') }}" class="waves-effect">
                        <i class="uil-lock-open-alt"></i>
                        <span>{{ __('messages.openaccount_title') }}</span>
                    </a>
                </li>
                <li class="{{ Route::is('closeaccount.index','closeaccount.create','closeaccount.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('closeaccount.index') }}" class="waves-effect">
                        <i class="uil-lock-alt"></i>
                        <span>{{ __('messages.closeaccount_title') }}</span>
                    </a>
                </li>

                <li class="{{ Route::is('branch.index','branch.create','branch.edit','branch.view') ? 'mm-active' : '' }}">
                    <a href="{{ route('branch.index') }}" class="waves-effect">
                        <i class="uil-map-pin-alt"></i>
                        <span>{{ __('messages.branch_title') }}</span>
                    </a>
                </li>
                <li class="{{ Route::is('room.index','room.create','room.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('room.index') }}" class="waves-effect">
                        <i class="uil-key-skeleton-alt"></i>
                        <span>{{ __('messages.room_title') }}</span>
                    </a>
                </li>
                <li class="{{ Route::is('staff.index','staff.create','staff.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('staff.index') }}" class="waves-effect">
                        <i class="uil-user-check"></i>
                        <span>{{ __('messages.manager_title') }}</span>
                    </a>
                </li>
                <li class="{{ Route::is('exportaspdf') ? 'mm-active' : '' }}">
                    <a href="{{ route('exportaspdf') }}" class="waves-effect">
                        <i class="uil-cloud-download"></i>
                        <span>PDF Download</span>
                    </a>
                </li>
                <li class="{{ Route::is('export_reportpdf') ? 'mm-active' : '' }}">
                    <a href="{{ route('export_reportpdf') }}" class="waves-effect">
                        <i class="uil-cloud-download"></i>
                        <span>Report</span>
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
