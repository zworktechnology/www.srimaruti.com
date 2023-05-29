@include('components.header')

<body>

    {{-- @include('components.preloader') --}}

    @include('components.menu')

    <!-- Breadcumb -->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/frontend/img/breadcumb/breadcumb-bg.jpg') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Rooms</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Rooms</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Service inner Area -->
    <div class="space">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="title-area mt-n1 mb-30 text-center">
                        <span class="sub-title">Room & Suites</span>
                        <h2 class="sec-title">Hotel Rooms / Suites</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <nav class="tablist">
                <div class="filter-menu nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="" id="nav-queen-tab" data-bs-toggle="tab" data-bs-target="#nav-queen-three" type="button" role="tab">Srirangam</button>
                    <button class="" id="nav-dexury-tab" data-bs-toggle="tab" data-bs-target="#nav-dexury-one" type="button" role="tab">Samayapuram</button>
                    <button class="active" id="nav-luxury-tab" data-bs-toggle="tab" data-bs-target="#nav-luxury-two" type="button" role="tab">Gunaseelam</button>
                </div>
            </nav>
            <div class="tab-content " id="nav-tabContent">
                <div class="tab-pane slider-shadow fade" id="nav-dexury-one" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/image/room/DSC_3494.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1200 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Double luxury Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">2 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">1 Bed Extra</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 900</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/image/room/DSC_3523.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1500 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Triple Queen Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">2 Bed Extra</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 1200</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/image/room/DSC_3523.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1700 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Soot Altra Pro Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">4 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">1 Bed Extra</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 1700</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane slider-shadow show active fade" id="nav-luxury-two" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/image/room/DSC_3895.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1200 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Double luxury Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">2 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">1 Bed Extra</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 900</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/image/room/DSC_3917.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1500 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Triple Queen Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">2 Bed Extra</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 1200</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/image/room/DSC_3917.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1800 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Quad Pro Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">4 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">1 Bed Extra</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 1500</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane slider-shadow fade" id="nav-queen-three" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/image/room/DSC_3673.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1100 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Double luxury Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">2 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">1 Bed Extra</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 700</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/image/room/DSC_3669.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1300 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Triple Queen Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">1 Bed Extra</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 900</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/image/room/DSC_3683.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1500 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Quad Pro Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">4 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">1 Bed Extra</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 1200</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/image/room/DSC_3561.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 2200 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Guest Pro House</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">7 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/image/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">1 Bed Extra</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 2200</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')

    @include('components.script')

</body>

</html>
