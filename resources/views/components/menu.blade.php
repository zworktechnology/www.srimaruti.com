<!-- Mobile Menu -->
<div class="as-menu-wrapper">
    <div class="as-menu-area text-center">
        <button class="as-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="/"><img src="{{ asset('assets/frontend/image/logo.png') }}" alt="" style="height:110px; width:auto;"></a>
        </div>
        <div class="as-mobile-menu">
            <ul>
                <li>
                    <a href="{{ route('index') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('about') }}">About us</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ route('room.srirangam') }}">Branch</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('room.srirangam') }}">Srirangam</a></li>
                        <li><a href="{{ route('room.samyapuram') }}">Samayapuram</a></li>
                        <li><a href="{{ route('room.gunaseelam') }}">Gunaseelam</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('masstrust') }}">Sri Mass Trust</a>
                </li>
                <li>
                    <a href="{{ route('kosaalai') }}">Kaamadhenu Kosaalai</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}">Contact Us</a>
                </li>
                <li hidden>
                    <a href="{{ route('feedback') }}">Feed Back</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Header -->
<header class="as-header header-layout4 header-absolute">
    <div class="header-top">
        <div class="container-fluid text-lg-start text-center">
            <div class="menu-top">
                <div class="row justify-content-center justify-content-lg-between align-items-center">
                    <div class="col-auto d-none d-xl-block">
                        <div class="header-links">
                            <ul>
                                <li><i class="fa-solid fa-phone"></i><a href="tel:+919659464543">+91 96594 64543</a>
                                </li>
                                <li><i class="fa-solid fa-envelope"></i><a href="mailto:info@srimaruti.com">
                                        info@srimaruti.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto d-none d-xl-block">
                        <div class="header-right-wrapper">
                            <div class="header-social">
                                <span class="social-title">Follow Us: </span>
                                <a href="https://www.facebook.com/srimarutiinn" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.youtube.com/@srimarutiinn" target="_blank"><i class="fab fa-youtube"></i></a>
                                <a href="https://twitter.com/sri_maruti_inn" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.instagram.com/sri_maruti_inn" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <div class="menu-area">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="menu-left">
                            <button type="button" class="as-menu-toggle"><i class="far fa-bars"></i></button>
                            <div class="dropdown as-header-categories-btn">
                                <span class="as-all-categories">Browse your destination place</span>
                                <div class="header-categories-btn">
                                    <i class="fa-regular fa-angle-down"></i>
                                </div>
                                <ul class="dropdown-menu d-none d-lg-block">
                                    <li><a href="{{ route('room.srirangam') }}"><span>Srirangam, Tiruchirappalli</span></a></li>
                                    <li><a href="{{ route('room.samyapuram') }}"><span>Samayapuram, Tiruchirappalli</span></a></li>
                                    <li><a href="{{ route('room.gunaseelam') }}"><span>Gunaseelam, Tiruchirappalli</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="javascript:void(0);"><img src="{{ asset('assets/frontend/image/logo.png') }}" alt="" style="height:110px; width:auto;"></a>
                        </div>
                    </div>
                    <div class="col-auto" style="display: flex;">
                        <div class="header-button" style="padding-right: 20px;">
                            <a href="https://api.whatsapp.com/send/?phone=%2B919944737705" target="_blank" class="as-btn style4 shadow-none">CHAT WITH US</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
