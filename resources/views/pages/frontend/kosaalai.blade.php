@include('components.header')

<body>

    {{-- @include('components.preloader') --}}

    @include('components.menu')

    <!-- Breadcumb -->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/frontend/img/breadcumb/breadcumb-bg.jpg') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Kaamadhenu Kosaalai</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html.htm">Home</a></li>
                    <li>Kosaalai</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Our Restaurant Area -->
    <div class="space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="restaurent-box-wrapper">
                        <div class="resaturant-img as-carousel" data-arrows="true" data-slide-show="1" data-fade="true">
                            <a href="javascript:void(0);"><img src="{{ asset('assets/frontend/img/gallery/gallery_6_1.jpg') }}" alt="Restaurant Image"></a>
                            <a href="javascript:void(0);"><img src="{{ asset('assets/frontend/img/gallery/gallery_6_2.jpg') }}" alt="Restaurant Image"></a>
                            <a href="javascript:void(0);"><img src="{{ asset('assets/frontend/img/gallery/gallery_6_3.jpg') }}" alt="Restaurant Image"></a>
                        </div>
                        <div class="resta-card-wrapp">
                            <span class="resta-card_subtitle mt-n1">restaurant</span>
                            <h2 class="resta-card_title"><a href="javascript:void(0);" tabindex="-1">The Rich Tradition Of
                                    Personal Service</a>
                            </h2>
                            <p class="resta-card_text">Compellingly utilize client-centric initiatives with competitive
                                idea. Competent target trunk application through future-proof market. Credibly orchestrate
                                scalable quality vectors without wireless platforms. Appropriately pontificate performance
                                based networks through vertical catalysts for change.</p>
                            <div class="restaurent-menu-wrapp">
                                <h3 class="resta-title">Open Days<span class="resta-desc"> Monday - Saturday</span></h3>
                                <h3 class="resta-title">Open Daily<span class="resta-desc"> 7.30 am - 11.00pm</span></h3>
                                <h3 class="resta-title">Price Range <span class="resta-desc">$40 - $500</span></h3>
                            </div>
                            <div class="resta-content-btn mt-35">

                                <div class="resta-wrapp">
                                    <div class="restaurant-author">
                                        <div class="resta-box_avater">
                                            <img src="{{ asset('assets/frontend/img/shape/chef.png') }}" alt="restaurant">
                                        </div>
                                        <div class="restaurant-author">
                                            <div class="resta-box_profile">
                                                <div class="media-body">
                                                    <h3 class="resta-box_name h6">Richal Vitons</h3>
                                                    <span class="resta-box_desig">Head Chef</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="about-info">
                                        <div class="media-body">
                                            <p class="about-info_link">
                                                <span class="about-info_label">call us:</span><a href="tel:+163 2356 5436">+163 2356 5436</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="restaurent-item-wrapper mt-60">
                <div class="row">
                    <div class="col-lg-6 col-xl-4">
                        <div class="menu-item style2">
                            <div class="menu-item_img">
                                <img src="{{ asset('assets/frontend/img/menu/menu_1_1.jpg') }}" alt="">
                            </div>
                            <div class="menu-item_content">
                                <a href="javascript:void(0);">
                                    <h3 class="menu-item_title">Gravy Veg Dish</h3>
                                </a>
                                <p class="menu-item_desc">Seamlessly generate top-line intellectual capital through covalent
                                    platforms. Energetically grow transparent networks after front-end interfaces.
                                    Objectively maintain compelling outsourcing.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="menu-item style2">
                            <div class="menu-item_img">
                                <img src="{{ asset('assets/frontend/img/menu/menu_1_2.jpg') }}" alt="">
                            </div>
                            <div class="menu-item_content">
                                <a href="javascript:void(0);">
                                    <h3 class="menu-item_title">Chicken Kofta</h3>
                                </a>
                                <p class="menu-item_desc">Seamlessly generate top-line intellectual capital through covalent
                                    platforms. Energetically grow transparent networks after front-end interfaces.
                                    Objectively maintain compelling outsourcing.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="menu-item style2">
                            <div class="menu-item_img">
                                <img src="{{ asset('assets/frontend/img/menu/menu_1_3.jpg') }}" alt="">
                            </div>
                            <div class="menu-item_content">
                                <a href="javascript:void(0);">
                                    <h3 class="menu-item_title">Special Thali</h3>
                                </a>
                                <p class="menu-item_desc">Seamlessly generate top-line intellectual capital through covalent
                                    platforms. Energetically grow transparent networks after front-end interfaces.
                                    Objectively maintain compelling outsourcing.</p>
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
