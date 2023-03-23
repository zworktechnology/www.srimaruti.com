@include('components.header')

<body>

    {{-- @include('components.preloader') --}}

    @include('components.menu')

    <!-- Hero Area -->
    <div class="as-hero-wrapper hero-4" id="hero">
        <div class="hero-slider-2 as-carousel" id="heroSlide1" data-fade="true" data-slide-show="1" data-md-slide-show="1" data-arrows="true" data-xl-arrows="true" data-ml-arrows="true" data-lg-arrows="true">
            <div class="as-hero-slide">
                <div class="as-hero-bg" data-bg-src="{{ asset('assets/frontend/img/hero/hero_bg_4_1.jpg') }}">
                </div>
                <div class="container">
                    <div class="hero-style4">
                        <h4 class="hero-subtitle" data-ani="slideindown" data-ani-delay="0.1s">Find The Coolest
                            Hotel</h4>
                        <h1 class="hero-title mb-0" data-ani="slideindown" data-ani-delay="0.0s">The Iconic Beach Hotel
                        </h1>
                        <h1 class="hero-title" data-ani="slideindown" data-ani-delay="0.0s">In Maldives</h1>
                    </div>
                </div>
            </div>


            <div class="as-hero-slide">
                <div class="as-hero-bg" data-bg-src="{{ asset('assets/frontend/img/hero/hero_bg_4_2.jpg') }}">
                </div>
                <div class="container">

                    <div class="hero-style4">
                        <h4 class="hero-subtitle" data-ani="slideindown" data-ani-delay="0.1s">Welcome To Hibtel</h4>
                        <h1 class="hero-title mb-0" data-ani="slideindown" data-ani-delay="0.0s">Enjoy Your Holidays </h1>
                        <h1 class="hero-title" data-ani="slideindown" data-ani-delay="0.0s">At Boutique Hotel</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="icon-box">
            <button data-slick-prev="#heroSlide1" class="slick-arrow default1"><i class="fa-solid fa-angle-left"></i>
                <img src="{{ asset('assets/frontend/img/hero/prev.jpg') }}" alt="">
            </button>
            <button data-slick-next="#heroSlide1" class="slick-arrow default2"><i class="fa-solid fa-angle-right"></i>
                <img src="{{ asset('assets/frontend/img/hero/next.jpg') }}" alt="">
            </button>
        </div>
    </div>

    <!-- Service  Area -->
    <div class="service-area-four space">
        <div class="container">
            <div class="row justify-content-between align-items-center justify-content-lg-center">
                <div class="col-xl-5">
                    <div class="title-area mb-50">
                        <span class="sub-title">Room & suites</span>
                        <h2 class="sec-title">Hotel Rooms / suites</h2>
                    </div>
                </div>
                <div class=" col-xl-7">
                    <nav class="tablist">
                        <div class="filter-menu nav nav-tabs mb-45" id="nav-tab" role="tablist">
                            <button class="active" id="nav-dexury1-tab" data-bs-toggle="tab" data-bs-target="#nav-dexury1-one" type="button" role="tab">Double</button>
                            <button class="" id="nav-luxury1-tab" data-bs-toggle="tab" data-bs-target="#nav-luxury1-two" type="button" role="tab">Triple</button>
                            <button class="" id="nav-queen1-tab" data-bs-toggle="tab" data-bs-target="#nav-queen1-three" type="button" role="tab">Quad</button>
                            <button class="" id="nav-single1-tab" data-bs-toggle="tab" data-bs-target="#nav-single1-four" type="button" role="tab">Guest House & Soot</button>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="tab-content " id="nav-tabContent">
                <div class="tab-pane slider-shadow show active fade" id="nav-dexury1-one" role="tabpanel">
                    <div class="row as-carousel" id="blogSlide1" data-slide-show="2" data-xxl-slide-show="2" data-lg-slide-show="1" data-md-slide-show="1" data-sm-slide-show="1" data-arrows="true">
                        <div class="col-md-6 col-xl-auto">
                            <div class="service-card-two style4 extra">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_4.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1100 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Room at <span style="color: #ea5c0b">Srirangam</span></a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">2 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">1 Extra Bed</span>
                                        </div>
                                    </div>
                                    <p class="ser-text">The cost of the room is GST excluding.</p>
                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 700</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-auto">
                            <div class="service-card-two style4 extra">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_4.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1200 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Room at <span style="color: #ea5c0b">Samayapuram</span></a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">2 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">1 Extra Bed</span>
                                        </div>
                                    </div>
                                    <p class="ser-text">The cost of the room is GST excluding.</p>
                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 900</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-auto">
                            <div class="service-card-two style4 extra">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_4.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1200 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Room at <span style="color: #ea5c0b">Gunaseelam</span></a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">2 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">1 Extra Bed</span>
                                        </div>
                                    </div>
                                    <p class="ser-text">The cost of the room is GST excluding.</p>
                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 900</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane slider-shadow fade" id="nav-luxury1-two" role="tabpanel">
                    <div class="row as-carousel" id="blogSlide1" data-slide-show="2" data-xl-slide-show="2" data-lg-slide-show="2" data-md-slide-show="1" data-sm-slide-show="1" data-arrows="true">
                        <div class="col-md-6 col-xl-auto">
                            <div class="service-card-two style4 extra">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_4.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1300 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Room at <span style="color: #ea5c0b">Srirangam</span></a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">1 Extra Bed</span>
                                        </div>
                                    </div>
                                    <p class="ser-text">The cost of the room is GST excluding.</p>
                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 900</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-auto">
                            <div class="service-card-two style4 extra">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_4.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1500 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Room at <span style="color: #ea5c0b">Samayapuram</span></a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">2 Extra Bed</span>
                                        </div>
                                    </div>
                                    <p class="ser-text">The cost of the room is GST excluding.</p>
                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 1200</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-auto">
                            <div class="service-card-two style4 extra">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_4.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1500 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Room at <span style="color: #ea5c0b">Gunaseelam</span></a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">3 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">2 Extra Bed</span>
                                        </div>
                                    </div>
                                    <p class="ser-text">The cost of the room is GST excluding.</p>
                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 1200</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane slider-shadow fade" id="nav-queen1-three" role="tabpanel">
                    <div class="row as-carousel" id="blogSlide1" data-slide-show="2" data-xl-slide-show="2" data-lg-slide-show="2" data-md-slide-show="1" data-sm-slide-show="1" data-arrows="true">
                        <div class="col-md-6 col-xl-auto">
                            <div class="service-card-two style4 extra">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_4.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1500 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Room at <span style="color: #ea5c0b">Srirangam</span></a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">4 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">1 Extra Bed</span>
                                        </div>
                                    </div>
                                    <p class="ser-text">The cost of the room is GST excluding.</p>
                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 1200</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-auto">
                            <div class="service-card-two style4 extra">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_4.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1800 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Room at <span style="color: #ea5c0b">Gunaseelam</span></a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">4 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">2 Extra Bed</span>
                                        </div>
                                    </div>
                                    <p class="ser-text">The cost of the room is GST excluding.</p>
                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 1500</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane slider-shadow fade" id="nav-single1-four" role="tabpanel">
                    <div class="row as-carousel" id="blogSlide1" data-slide-show="2" data-xl-slide-show="2" data-lg-slide-show="2" data-md-slide-show="1" data-sm-slide-show="1" data-arrows="true">
                        <div class="col-md-6 col-xl-auto">
                            <div class="service-card-two style4 extra">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_4.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 2200 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Guest House at <span style="color: #ea5c0b">Srirangam</span></a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/guest.svg') }}" alt="">
                                            <span class="ser-title">7 Bed</span>
                                        </div>
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">7 Extra Bed</span>
                                        </div>
                                    </div>
                                    <p class="ser-text">The cost of the room is GST excluding.</p>
                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 2200</a>
                                        <a href="{{ route('contact') }}" class="line-btn">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-auto">
                            <div class="service-card-two style4 extra">
                                <div class="service-card_img">
                                    <img src="{{ asset('assets/frontend/img/service/service_4_4.jpg') }}" alt="Service">
                                </div>
                                <div class="service-card_content-two">
                                    <div>
                                        <div class="service-price">
                                            <span class="service-card_subtitle">₹ 1700 PER NIGHT (AC)</span>
                                        </div>
                                        <h3 class="service-card_title"><a href="javascript:void(0);">Soot Room at <span style="color: #ea5c0b">Samayapuram</span></a>
                                        </h3>
                                    </div>
                                    <div class="service-card-wrapper">
                                        <div class="service-icon">
                                            <img src="{{ asset('assets/frontend/img/icon/bed.svg') }}" alt="">
                                            <span class="ser-title">4 Bed</span>
                                        </div>
                                    </div>
                                    <p class="ser-text">The cost of the room is GST excluding.</p>
                                    <div class="service-wrapper">
                                        <a href="javascript:void(0);" class="line-btn style3">Starts From ₹ 1700</a>
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

    <!-- About Area -->
    <div class="space about-section" id="about-sec" data-bg-src="{{ asset('assets/frontend/img/bg/about_bg.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-xxl-6">
                    <div class="img-box1 style4">
                        <div class="img1">
                            <img class="image_1" src="{{ asset('assets/frontend/img/normal/about_4.png') }}" alt="About">
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-xxl-6">
                    <div class="title-area mt-n1">
                        <span class="sub-title">ABOUT US</span>
                        <h2 class="sec-title">Welcome To Hibtel Beach Hotel And Resort</h2>
                        <p class="mb-20">Phosfluorescently communicate e-business results for orthogonal potentialities.
                            Globally envisioneer state of the art resources for market positioning niches. Uniquely impact.
                            Proactively matrix inexpensive opportunities for technically. Distinctively disintermediate
                            strategic benefits before B2C outsourcing.</p>
                        <p class="mb-0">Phosfluorescently communicate e-business results for orthogonal potentialities.
                            Globally envisioneer state of the art resources for market positioning niches. Uniquely impact.
                            Proactively matrix inexpensive opportunities for technically.</p>
                    </div>
                    <div class="btn-group style1">
                        <a href="about.html.htm" class="as-btn shadow-none">About More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature Area -->
    <div class="bg-top-center space">
        <div class="container">
            <div class="title-area mt-n1 mb-30 text-center">
                <span class="sub-title">SERVICES & AMENITIES</span>
                <h2 class="sec-title">Our Hotel Services And Amenities</h2>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="service-box style4">
                        <div class="service-box_icon">
                            <img src="{{ asset('assets/frontend/img/icon/resturant.svg') }}" alt="">
                        </div>
                        <div class="service-box_content">
                            <h3 class="service-box_title">RO Drinking Water</h3>
                            <p class="service-box_desc">Authoritatively parallel task multifunctional communities before cross functional.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="service-box style4">
                        <div class="service-box_icon">
                            <img src="{{ asset('assets/frontend/img/icon/spa.svg') }}" alt="">
                        </div>
                        <div class="service-box_content">
                            <h3 class="service-box_title">24/7 Hot Water</h3>
                            <p class="service-box_desc">Authoritatively parallel task multifunctional communities before cross functional.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="service-box style4">
                        <div class="service-box_icon">
                            <img src="{{ asset('assets/frontend/img/icon/swimming.svg') }}" alt="">
                        </div>
                        <div class="service-box_content">
                            <h3 class="service-box_title">Television</h3>
                            <p class="service-box_desc">Authoritatively parallel task multifunctional communities before cross functional.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="service-box style4">
                        <div class="service-box_icon">
                            <img src="{{ asset('assets/frontend/img/icon/wifi.svg') }}" alt="">
                        </div>
                        <div class="service-box_content">
                            <h3 class="service-box_title">Wifi & Intercom</h3>
                            <p class="service-box_desc">Authoritatively parallel task multifunctional communities before cross functional.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="service-box style4">
                        <div class="service-box_icon">
                            <img src="{{ asset('assets/frontend/img/icon/car.svg') }}" alt="">
                        </div>
                        <div class="service-box_content">
                            <h3 class="service-box_title">Pick Up & Drop​</h3>
                            <p class="service-box_desc">Authoritatively parallel task multifunctional communities before cross functional.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="service-box style4">
                        <div class="service-box_icon">
                            <img src="{{ asset('assets/frontend/img/icon/air.svg') }}" alt="">
                        </div>
                        <div class="service-box_content">
                            <h3 class="service-box_title">Air Conditioner</h3>
                            <p class="service-box_desc">Authoritatively parallel task multifunctional communities before cross functional.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="service-box style4">
                        <div class="service-box_icon">
                            <img src="{{ asset('assets/frontend/img/icon/parking.svg') }}" alt="">
                        </div>
                        <div class="service-box_content">
                            <h3 class="service-box_title">Parking Space</h3>
                            <p class="service-box_desc">Authoritatively parallel task multifunctional communities before cross functional.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="service-box style4">
                        <div class="service-box_icon">
                            <img src="{{ asset('assets/frontend/img/icon/shower.svg') }}" alt="">
                        </div>
                        <div class="service-box_content">
                            <h3 class="service-box_title">Laundry</h3>
                            <p class="service-box_desc">Authoritatively parallel task multifunctional communities before cross functional.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- choose Area -->
    <div class="choose-area-two">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-6">
                    <div class="choose-content">
                        <div class="title-area mt-n1">
                            <span class="sub-title">Why Choose Us</span>
                            <h2 class="sec-title text-white">We Are Always Readyto Take Challange</h2>
                            <p class="sec-desc">Professionally predominate enterprise-wide testing procedures whereas viral e chooses.
                                Competently communicate enterprise-wide experiences rather than interactive networks.
                                Interactively incentivize team.</p>
                        </div>
                        <div class="choose-wrapper">
                            <div class="choose-box style2">
                                <div class="choose-box_icon">
                                    <img src="{{ asset('assets/frontend/img/shape/save-doller.svg') }}" alt="">
                                </div>
                                <div class="choose-box_content">
                                    <h3 class="choose-box_title text-white">Best Rate Guarantee</h3>
                                    <p class="choose-box_desc">Dynamically facilitate best of breed benefits without.</p>
                                </div>
                            </div>
                            <div class="choose-box style2">
                                <div class="choose-box_icon">
                                    <img src="{{ asset('assets/frontend/img/shape/balance.svg') }}" alt="">
                                </div>
                                <div class="choose-box_content">
                                    <h3 class="choose-box_title text-white">No Booking Fee</h3>
                                    <p class="choose-box_desc">Dynamically facilitate best of breed benefits without.</p>
                                </div>
                            </div>
                            <div class="choose-box style2">
                                <div class="choose-box_icon">
                                    <img src="{{ asset('assets/frontend/img/shape/user.svg') }}" alt="">
                                </div>
                                <div class="choose-box_content">
                                    <h3 class="choose-box_title text-white">24/7 Support</h3>
                                    <p class="choose-box_desc">Dynamically facilitate best of breed benefits.</p>
                                </div>
                            </div>
                            <div class="choose-box style2">
                                <div class="choose-box_icon">
                                    <img src="{{ asset('assets/frontend/img/shape/bed.svg') }}" alt="">
                                </div>
                                <div class="choose-box_content">
                                    <h3 class="choose-box_title text-white">Luxury Room</h3>
                                    <p class="choose-box_desc">Dynamically facilitate best of breed benefits.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="choose-img number-dots as-carousel" data-dots="true" data-xl-dots="true" data-ml-dots="true" data-lg-dots="true" data-md-dots="true">
                        <a href="javascript:void(0);"><img src="{{ asset('assets/frontend/img/normal/choose_1.jpg') }}" alt="Choose Image"></a>
                        <a href="javascript:void(0);"><img src="{{ asset('assets/frontend/img/normal/choose_3.jpg') }}" alt="Choose Image"></a>
                        <a href="javascript:void(0);"><img src="{{ asset('assets/frontend/img/normal/choose_1.jpg') }}" alt="Choose Image"></a>
                        <a href="javascript:void(0);"><img src="{{ asset('assets/frontend/img/normal/choose_3.jpg') }}" alt="Choose Image"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Counter Area -->
    <div class="counter-area-two" data-bg-src="assets/img/bg/counter_bg_1.png">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-card ">
                        <h2 class="counter-card_number"><span class="counter-number">25</span>+</h2>
                        <p class="counter-card_text">Years Experiences</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-card ">
                        <h2 class="counter-card_number"><span class="counter-number">1.6</span><span class="counter-text">k</span>+</h2>
                        <p class="counter-card_text">Yearly Customers</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-card ">
                        <h2 class="counter-card_number"><span class="counter-number">36</span>+</h2>
                        <p class="counter-card_text">Visitors daily</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-card ">
                        <h2 class="counter-card_number"><span class="counter-number">26</span>+</h2>
                        <p class="counter-card_text">Awards & honors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial -->
    <section class=" space bg-smoke overflow-hidden testimonial-area-four">
        <div class="container">
            <div class="testi-box-area">
                <div class="testi-box-slide">
                    <div class="title-area mb-40">
                        <span class="sub-title">Testimonials</span>
                        <h2 class="sec-title">What Client Say</h2>
                    </div>
                    <div class="as-carousel" id="testiSlide1" data-slide-show="1" data-fade="true">
                        <div>
                            <div class="testi-box">
                                <div class="star-icon">
                                    <a href="javascript:void(0);"><i class="fa-solid fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fa-solid fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fa-solid fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fa-solid fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fa-solid fa-star"></i></a>
                                </div>
                                <p class="testi-box_text">“Progressively engage top-line niche markets after tactical
                                    e-markets. Energistically create superior outsourcing with market positioning
                                    information. Proactively visualize fully tested processes and distributed growth
                                    strategies”.</p>
                                <div class="testi-box_profile">
                                    <div class="testi-box_avater style2">
                                        <img src="{{ asset('assets/frontend/img/testimonial/testi_1_1.jpg') }}" alt="testimonial">
                                    </div>
                                    <div class="media-body">
                                        <h3 class="testi-box_name h6">Ricardo S. Yosef</h3>
                                        <span class="testi-box_desig">CEO & Founder</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="testi-box">
                                <div class="star-icon">
                                    <a href="javascript:void(0);"><i class="fa-solid fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fa-solid fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fa-solid fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fa-solid fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fa-solid fa-star"></i></a>
                                </div>
                                <p class="testi-box_text">“Intrinsicly leverage existing top-line expertise via turnkey
                                    models. Authoritatively leverage existing wireless benefits rather than resource
                                    sucking value. Competently leverage other's enterprise experiences.”</p>

                                <div class="testi-box_profile">
                                    <div class="testi-box_avater style2">
                                        <img src="{{ asset('assets/frontend/img/testimonial/testi_1_2.jpg') }}" alt="testimonial">
                                    </div>
                                    <div class="media-body">
                                        <h3 class="testi-box_name h6">David H. Smith</h3>
                                        <span class="testi-box_desig">CEO & Founder</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="testi-box">
                                <div class="star-icon">
                                    <a href="javascript:void(0);"><i class="fa-solid fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fa-solid fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fa-solid fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fa-solid fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fa-solid fa-star"></i></a>
                                </div>
                                <p class="testi-box_text">“Vestibulum ac diam sit amet quam vehicula elementum sed sit amet
                                    dui. Donec sollicitudin molestie malesuada. Donec sollicitudin molestie malesuada.
                                    Vestibulum
                                    ac vehicula elementum sed sit amet dui.”</p>
                                <div class="testi-box_profile">
                                    <div class="testi-box_avater style2">
                                        <img src="{{ asset('assets/frontend/img/testimonial/testi_1_3.jpg') }}" alt="testimonial">
                                    </div>
                                    <div class="media-body">
                                        <h3 class="testi-box_name h6">Jenifer Lope</h3>
                                        <span class="testi-box_desig">CEO & Founder</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="icon-box">
                        <button data-slick-prev="#testiSlide1" class="slick-arrow default"><i class="far fa-arrow-left"></i></button>
                        <button data-slick-next="#testiSlide1" class="slick-arrow default"><i class="far fa-arrow-right"></i></button>
                    </div>
                    <div class="tesi-shape">
                        <img src="{{ asset('assets/frontend/img/testimonial/icon%20shape.png') }}" alt="">
                    </div>
                </div>
                <div class="testi-box-img">
                    <div class="testi-box_quote">
                        <i class="fa-solid fa-quote-right"></i>
                    </div>
                    <img src="{{ asset('assets/frontend/img/testimonial/testi_img.png') }}" alt="Testmonial">
                </div>
            </div>
        </div>
    </section>

    <!-- Cta Area -->
    <div class="cta-banner" style="margin-top: 90px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="cta-card">
                        <div class="cta-card_img">
                            <img src="{{ asset('assets/frontend/img/normal/cta_1_1.jpg') }}" alt="cta">
                            <div class="cta-card_content">
                                <span class="cta-card_subtitle">2 Nights & 3 Days</span>
                                <h3 class="cta-card_title"><a href="javascript:void(0);" tabindex="0"><span class="discount">35%</span> OFF Super Deluxe Double Room</a></h3>
                                <div class="cta-card-btn"><a href="javascript:void(0);" class="as-btn style4 shadow-none">book now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="cta-card">
                        <div class="cta-card_img">
                            <img src="{{ asset('assets/frontend/img/normal/cta_1_2.jpg') }}" alt="cta">
                            <div class="cta-card_content">
                                <span class="cta-card_subtitle">2 Nights & 3 Days</span>
                                <h3 class="cta-card_title"><a href="javascript:void(0);" tabindex="0"><span class="discount">50%</span> OFF Super Luxury Single Room</a></h3>
                                <div class="cta-card-btn"><a href="javascript:void(0);" class="as-btn style4  shadow-none">book now</a>
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
