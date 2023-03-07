@include('components.header')

<body>

    {{-- @include('components.preloader') --}}

    @include('components.menu')

    <!-- Breadcumb -->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/frontend/img/breadcumb/breadcumb-bg.jpg') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">About Us</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html.htm">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- About -->
    <div class="space about-section" id="about-sec">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-xxl-6">
                    <div class="img-box1">
                        <div class="img1">
                            <img class="image_1" src="{{ asset('assets/frontend/img/normal/about_1.png') }}" alt="About">
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-xxl-6">
                    <div class="title-area mb-45">
                        <span class="sub-title">ABOUT US</span>
                        <h2 class="sec-title">Hibtel is The Best Hotels to Celebrate Life</h2>
                        <p class="mt-n2">Phosfluorescently communicate e-business results for orthogonal
                            potentialities. Globally envisioneer state of the art resources for market positioning
                            niches. Uniquely impact. Proactively matrix inexpensive opportunities for technically..
                        </p>
                    </div>
                    <div class="about-wrapp">
                        <div class="about-content-1">
                            <div class="about-icon">
                                <img src="{{ asset('assets/frontend/img/shape/save-doller.svg') }}">
                            </div>
                            <div class="about-text-wrapper">
                                <h2 class="about-title">Best Rate Guarantee</h2>
                                <p class="about-text">Dynamically facilitate best of breed benefits without.</p>
                            </div>
                        </div>
                        <div class="about-content-1">
                            <div class="about-icon">
                                <img src="{{ asset('assets/frontend/img/shape/save-money.svg') }}">
                            </div>
                            <div class="about-text-wrapper">
                                <h2 class="about-title">No Booking Fee</h2>
                                <p class="about-text">Dynamically facilitate best of breed benefits.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Counter -->
    <div class="counter-area-three" data-bg-src="{{ asset('assets/frontend/img/bg/counter_bg_2.png') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-card ">
                        <h2 class="counter-card_number"><span class="counter-number text-white">25</span>+</h2>
                        <p class="counter-card_text">Years Experiences</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-card ">
                        <h2 class="counter-card_number"><span class="counter-number text-white">1.6</span><span class="counter-text">k</span>+</h2>
                        <p class="counter-card_text">Yearly Customers</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-card ">
                        <h2 class="counter-card_number"><span class="counter-number text-white">36</span>+</h2>
                        <p class="counter-card_text">Visitors daily</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-card ">
                        <h2 class="counter-card_number"><span class="counter-number text-white">26</span>+</h2>
                        <p class="counter-card_text">Awards & honors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About -->
    <div class="space about-section-three" id="about-sec">
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <div class="title-area mt-n1 mb-25 mr-50">
                        <span class="sub-title">MORE ABOUT US</span>
                        <h2 class="sec-title">The Hibtel Apartment Good Luxury, And Beautiful</h2>
                        <p class="mt-n2 mb-10">Phosfluorescently communicate e-business results for orthogonal
                            potentialities. Globally envisioneer state of the art resources for market positioning niches.
                            Uniquely impact. Proactively matrix inexpensive opportunities for technically.</p>
                    </div>
                    <div class="about-box-wrapp">
                        <div class="about-box-icon style2">
                            <div class="about-counter">
                                <i class="fa-solid fa-badge-check"></i>
                                <h2 class="counter-card_number"><span class="counter-number">9,000</span>Sq. Foot Paradise
                                </h2>
                            </div>
                        </div>
                        <div class="about-box-icon style2">
                            <div class="about-counter">
                                <i class="fa-solid fa-badge-check"></i>
                                <h2 class="counter-card_number"><span class="counter-number">160</span>+ Luxury Bedroom</h2>
                            </div>
                        </div>
                        <div class="about-box-icon style2">
                            <div class="about-counter">
                                <i class="fa-solid fa-badge-check"></i>
                                <h2 class="counter-card_number">Best Quality Services</h2>
                            </div>
                        </div>
                        <div class="about-box-icon style2">
                            <div class="about-counter">
                                <i class="fa-solid fa-badge-check"></i>
                                <h2 class="counter-card_number">Unlimited Best Facility</h2>
                            </div>
                        </div>
                    </div>
                    <div class="about-btn">
                        <a href="about.html.htm" class="as-btn shadow-none">Reservation</a>
                        <div class="about-info">
                            <div class="about-info_icon style1">
                                <a href="tel:+919659464543"><i class="fa-solid fa-phone"></i></a>
                            </div>
                            <div class="media-body">
                                <span class="about-info_label">Call us anytime</span>
                                <p class="about-info_link"><a href="tel:+919659464543">+91 96594 64543</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="img-box2">
                        <div class="img2">
                            <img class="image_1" src="{{ asset('assets/frontend/img/normal/about_2.png') }}" alt="About">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial -->
    <section class="space bg-smoke2 style3" data-bg-src="{{ asset('assets/frontend/img/bg/testimonial_bg_2.jpg') }}">
        <div class="container">
            <div class="title-area mt-n1 text-center">
                <span class="sub-title">Testimonials</span>
                <h2 class="sec-title">What Client Say</h2>
            </div>
            <div class="row as-carousel slider-shadow " data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="1" data-sm-slide-show="1" id="testislidev2">
                <div>
                    <div class="testi-card style3">
                        <div class="testi-content">
                            <p class="testi-box_text">“Intrinsicly leverage existing top-line expertise via turnkey
                                models. Authoritatively leverage existing wireless benefits rather than resource
                                sucking value. Competently leverage other's enterprise experiences”
                            </p>
                            <div class="star-icon">
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-regular fa-star"></i></a>
                                <a href="#"><i class="fa-regular fa-star"></i></a>
                                <span class="ratting">(4.7)</span>
                            </div>
                            <div class="testimonial-author">
                                <div class="testi-box_avater">
                                    <img src="{{ asset('assets/frontend/img/testimonial/author_1.png') }}" alt="testimonial">
                                </div>
                                <div class="testimonial-author">
                                    <div class="testi-box_profile">
                                        <div class="media-body">
                                            <h3 class="testi-box_name h6">David H. Smith</h3>
                                            <span class="testi-box_desig">UI/UX Designer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="testi-card style3">
                        <div class="testi-content">
                            <p class="testi-box_text">“Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                Donec sollicitudin molestie malesuada. Donec sollicitudin molestie malesuada. Vestibulum ac
                                vehicula elementum sed sit amet dui.”
                            </p>
                            <div class="star-icon">
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-regular fa-star"></i></a>
                                <a href="#"><i class="fa-regular fa-star"></i></a>
                                <span class="ratting">(4.7)</span>
                            </div>
                            <div class="testimonial-author">
                                <div class="testi-box_avater">
                                    <img src="{{ asset('assets/frontend/img/testimonial/author_2.png') }}" alt="testimonial">
                                </div>
                                <div class="testimonial-author">
                                    <div class="testi-box_profile">
                                        <div class="media-body">
                                            <h3 class="testi-box_name h6">Jenifer Lopez</h3>
                                            <span class="testi-box_desig">UI/UX Designer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="testi-card style3">
                        <div class="testi-content">
                            <p class="testi-box_text">“Sed porttitor lectus nibh. Vestibulum ante ipsum primis in faucibus
                                orci luctus et posuere ipsum primis cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                vel, ullamcorper ligula. Curabitur aliquet posuere.”
                            </p>
                            <div class="star-icon">
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-regular fa-star"></i></a>
                                <a href="#"><i class="fa-regular fa-star"></i></a>
                                <span class="ratting">(4.7)</span>
                            </div>
                            <div class="testimonial-author">
                                <div class="testi-box_avater">
                                    <img src="{{ asset('assets/frontend/img/testimonial/author_3.png') }}" alt="testimonial">
                                </div>
                                <div class="testimonial-author">
                                    <div class="testi-box_profile">
                                        <div class="media-body">
                                            <h3 class="testi-box_name h6">Alex Latham</h3>
                                            <span class="testi-box_desig">UI/UX Designer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="testi-card style3">
                        <div class="testi-content">
                            <p class="testi-box_text">“Praesent sapien massa, convallis a pellentesque nec, egestas non
                                nisi. Vivamus suscipit tortor eget felis porttitor volutpat. Proin eget tortor risus. Cras
                                ultricies ligula magna dictum Proin eget tortor risus.”
                            </p>
                            <div class="star-icon">
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-regular fa-star"></i></a>
                                <a href="#"><i class="fa-regular fa-star"></i></a>
                                <span class="ratting">(4.7)</span>
                            </div>
                            <div class="testimonial-author">
                                <div class="testi-box_avater">
                                    <img src="{{ asset('assets/frontend/img/testimonial/author_4.png') }}" alt="testimonial">
                                </div>
                                <div class="testimonial-author">
                                    <div class="testi-box_profile">
                                        <div class="media-body">
                                            <h3 class="testi-box_name h6">Michel Clurk</h3>
                                            <span class="testi-box_desig">UI/UX Designer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')

    @include('components.script')

</body>

</html>
