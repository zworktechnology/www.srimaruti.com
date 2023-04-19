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
                            <img class="image_1" src="{{ asset('assets/frontend/image/home-about-us.png') }}"
                                alt="About">
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-xxl-6">
                    <div class="title-area mb-45">
                        <span class="sub-title">ABOUT US</span>
                        <h2 class="sec-title">Experience Life's Celebrations at Maruti</h2>
                        <p class="mt-n2">At Maruthi Inn resort, we're more than just hotels. We're a celebration of
                            life. Our state-of-the-art resources and expertise in hospitality allow us to offer unique
                            experiences that cater to your needs. We believe that every stay with us should be an
                            opportunity to create memories that will last a lifetime.</p>
                    </div>
                    <div class="about-wrapp">
                        <div class="about-content-1">
                            <div class="about-icon">
                                <img src="{{ asset('assets/frontend/image/shape/save-doller.svg') }}">
                            </div>
                            <div class="about-text-wrapper">
                                <h2 class="about-title">Best Rate Guarantee</h2>
                                <p class="about-text">Book Direct and Save More on Your Stay.</p>
                            </div>
                        </div>
                        <div class="about-content-1">
                            <div class="about-icon">
                                <img src="{{ asset('assets/frontend/image/shape/save-money.svg') }}">
                            </div>
                            <div class="about-text-wrapper">
                                <h2 class="about-title">No Booking Fee</h2>
                                <p class="about-text">Enjoy Hassle-Free Booking with No Extra Charges.</p>
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
                        <h2 class="counter-card_number"><span class="counter-number text-white">20</span>+</h2>
                        <p class="counter-card_text">Years Experiences</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-card ">
                        <h2 class="counter-card_number"><span class="counter-number text-white">1.6</span><span
                                class="counter-text">k</span>+</h2>
                        <p class="counter-card_text">Yearly Customers</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-card ">
                        <h2 class="counter-card_number"><span class="counter-number text-white">30</span>+</h2>
                        <p class="counter-card_text">Visitors daily</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-card ">
                        <h2 class="counter-card_number"><span class="counter-number text-white">20</span>+</h2>
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
                        <h2 class="sec-title">Serene Environment, Unmatched Hospitality at Maruthi Resort</h2>
                        <p class="mt-n2 mb-10">At Maruthi Resort, we pride ourselves on creating a welcoming atmosphere
                            that fosters relaxation and rejuvenation. Our tranquil and serene surroundings provide the
                            perfect backdrop for meditation, spiritual exploration, and reconnecting with nature. With
                            our warm and friendly staff and modern amenities, we strive to create an unforgettable
                            experience for our guests.
                        </p>
                    </div>
                    <div class="about-box-wrapp">
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
                        <a href="{{ route('contact') }}" class="as-btn shadow-none">Contact Us</a>
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
                            <img class="image_1" src="{{ asset('assets/frontend/image/About us.png') }}"
                                alt="About">
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
            <div class="row as-carousel slider-shadow " data-slide-show="3" data-lg-slide-show="2"
                data-md-slide-show="1" data-sm-slide-show="1" id="testislidev2">
                <div>
                    <div class="testi-card style3">
                        <div class="testi-content">
                            <p class="testi-box_text">“Maruthi Resort exceeded my expectations with their warm and
                                friendly service and comfortable accommodations. I would highly recommend this hotel to
                                anyone visiting the area.”
                            </p>
                            <div class="star-icon">
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <span class="ratting">(5)</span>
                            </div>
                            <div class="testimonial-author">
                                <div class="testi-box_avater">
                                    <img src="{{ asset('assets/frontend/image/icon-2.png') }}"
                                        alt="testimonial">
                                </div>
                                <div class="testimonial-author">
                                    <div class="testi-box_profile">
                                        <div class="media-body">
                                            <h3 class="testi-box_name h6">Anandhan</h3>
                                            <span class="testi-box_desig">From Justdial</span>
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
                            <p class="testi-box_text">“I was impressed by the modern amenities and attention to detail
                                at Maruthi Resort. The hotel's prime location and impeccable service make it a top
                                choice for travelers.”
                            </p>
                            <div class="star-icon">
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <span class="ratting">(5)</span>
                            </div>
                            <div class="testimonial-author">
                                <div class="testi-box_avater">
                                    <img src="{{ asset('assets/frontend/image/icon-2.png') }}"
                                        alt="testimonial">
                                </div>
                                <div class="testimonial-author">
                                    <div class="testi-box_profile">
                                        <div class="media-body">
                                            <h3 class="testi-box_name h6">Gopipaleti</h3>
                                            <span class="testi-box_desig">From Planetofhotels</span>
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
                            <p class="testi-box_text">“From the moment I arrived, the staff at Maruthi Resort went
                                above and beyond to make me feel at home. Their commitment to providing a memorable
                                experience is unmatched.”
                            </p>
                            <div class="star-icon">
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <span class="ratting">(5)</span>
                            </div>
                            <div class="testimonial-author">
                                <div class="testi-box_avater">
                                    <img src="{{ asset('assets/frontend/image/icon-2.png') }}"
                                        alt="testimonial">
                                </div>
                                <div class="testimonial-author">
                                    <div class="testi-box_profile">
                                        <div class="media-body">
                                            <h3 class="testi-box_name h6">Sriram</h3>
                                            <span class="testi-box_desig">From Goibibo</span>
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
                            <p class="testi-box_text">“The resort's pick-up and drop service made traveling with kids a
                                breeze. We loved the spacious and comfortable rooms, and the air conditioning was a
                                lifesaver in the summer heat!”
                            </p>
                            <div class="star-icon">
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <span class="ratting">(5)</span>
                            </div>
                            <div class="testimonial-author">
                                <div class="testi-box_avater">
                                    <img src="{{ asset('assets/frontend/image/icon-2.png') }}"
                                        alt="testimonial">
                                </div>
                                <div class="testimonial-author">
                                    <div class="testi-box_profile">
                                        <div class="media-body">
                                            <h3 class="testi-box_name h6">Malathi</h3>
                                            <span class="testi-box_desig">From Makemytripe</span>
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
                            <p class="testi-box_text">“Maruthi Resort exceeded our expectations in every way. The
                                attention to detail and family-friendly atmosphere made it an unforgettable stay. We
                                can't wait to come back!”
                            </p>
                            <div class="star-icon">
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <span class="ratting">(5)</span>
                            </div>
                            <div class="testimonial-author">
                                <div class="testi-box_avater">
                                    <img src="{{ asset('assets/frontend/image/icon-2.png') }}"
                                        alt="testimonial">
                                </div>
                                <div class="testimonial-author">
                                    <div class="testi-box_profile">
                                        <div class="media-body">
                                            <h3 class="testi-box_name h6">Vimal</h3>
                                            <span class="testi-box_desig">From Justdail</span>
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
