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
                    <li><a href="index.html.htm">Home</a></li>
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
                    <button class="active" id="nav-dexury-tab" data-bs-toggle="tab" data-bs-target="#nav-dexury-one" type="button" role="tab">DELUXE </button>
                    <button class="" id="nav-luxury-tab" data-bs-toggle="tab" data-bs-target="#nav-luxury-two" type="button" role="tab">LUXURY</button>
                    <button class="" id="nav-queen-tab" data-bs-toggle="tab" data-bs-target="#nav-queen-three" type="button" role="tab">QUEEN</button>
                    <button class="" id="nav-single-tab" data-bs-toggle="tab" data-bs-target="#nav-single" type="button" role="tab">SINGLE</button>
                    <button class="" id="nav-suites-tab" data-bs-toggle="tab" data-bs-target="#nav-altra" type="button" role="tab">SUITES</button>
                    <button class="" id="nav-altra-tab" data-bs-toggle="tab" data-bs-target="#nav-altra" type="button" role="tab">ALTRA PRO</button>
                </div>
            </nav>
            <div class="tab-content " id="nav-tabContent">
                <div class="tab-pane slider-shadow show active fade" id="nav-dexury-one" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_4.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Deluxe Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_5.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment luxury Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_6.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Queen Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_6.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Single Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_7.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Suites Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_8.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Altra Pro Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane slider-shadow fade" id="nav-luxury-two" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_4.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Deluxe Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_5.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment luxury Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_6.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Queen Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_6.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Single Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_7.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Suites Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_8.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Altra Pro Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
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
                                    <img src="{{ asset('assets/frontend/img/service/service_3_4.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Deluxe Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_5.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment luxury Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_6.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Queen Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_6.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Single Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_7.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Suites Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_8.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Altra Pro Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane slider-shadow fade" id="nav-single" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_4.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Deluxe Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_5.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment luxury Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_6.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Queen Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_6.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Single Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_7.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Suites Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_8.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Altra Pro Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane slider-shadow fade" id="nav-suites" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_4.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Deluxe Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_5.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment luxury Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_6.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Queen Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_6.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Single Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_7.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Suites Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_8.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Altra Pro Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane slider-shadow fade" id="nav-altra" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_4.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Deluxe Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_5.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment luxury Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_3_6.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Queen Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_6.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Single Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_7.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Suites Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="service-card-two style3 mb-24 mt-0">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_8.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">PRICE $120.00 NIGHT</span>
                                            <div class="service-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Apartment Altra Pro Room</a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/1.svg') }}" alt="">
                                            <span class="ser-title">250 sqm</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bathroom.svg') }}" alt="">
                                            <span class="ser-title">3 Bathroom</span>
                                        </div>
                                    </div>

                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">VIEW DETAILS</a>
                                        <a href="javascript:void(0);" class="line-btn">BOOK NOW</a>
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
