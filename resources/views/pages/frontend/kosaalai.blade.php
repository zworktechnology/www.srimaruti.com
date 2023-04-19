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
                            <a href="javascript:void(0);"><img
                                    src="{{ asset('assets/frontend/image/kosalai/scrool-1.png') }}"
                                    alt="Restaurant Image"></a>
                            <a href="javascript:void(0);"><img
                                    src="{{ asset('assets/frontend/image/kosalai/scrool-2.png') }}"
                                    alt="Restaurant Image"></a>
                            <a href="javascript:void(0);"><img
                                    src="{{ asset('assets/frontend/image/kosalai/scrool-3.png') }}"
                                    alt="Restaurant Image"></a>
                        </div>
                        <div class="resta-card-wrapp">
                            <span class="resta-card_subtitle mt-n1">Kamadenu Kosaalai</span>
                            <h2 class="resta-card_title"><a href="javascript:void(0);" tabindex="-1">A Sanctuary for
                                    Cows and a Celebration of Tradition</a>
                            </h2>
                            <p class="resta-card_text">Kamadenu Kosaalai, founded by Sri Mass Trust, is dedicated to
                                preserving and promoting the welfare of cows while upholding our cultural heritage. We
                                rescue cows from harm and provide them with a safe and loving environment. Our Kosaalai
                                is a sanctuary where we perform daily poojas and rituals to honor and protect these
                                sacred animals. Our mission is to inspire a culture of kindness and respect towards all
                                animals, and promote a more sustainable and ethical way of life. Join us in protecting
                                the welfare of cows and creating a more compassionate world.</p>
                            <div class="restaurent-menu-wrapp">
                                <h3 class="resta-title">Free Milk<span class="resta-desc"> Age under 2</span></h3>
                                <h3 class="resta-title">Pooja at<span class="resta-desc"> Every Friday- Enter Free</span>
                                </h3>
                                <h3 class="resta-title">Starts From<span class="resta-desc">2011</span></h3>
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
                                <img src="{{ asset('assets/frontend/image/kosalai/tag-1.png') }}" alt="">
                            </div>
                            <div class="menu-item_content">
                                <a href="javascript:void(0);">
                                    <h3 class="menu-item_title">Tradition and Compassion</h3>
                                </a>
                                <p class="menu-item_desc">Explore our commitment to upholding cultural traditions and
                                    promoting a more sustainable and ethical way of life, including our weekly cow pooja
                                    and yearly children's education program, as we work to save and care for cows.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="menu-item style2">
                            <div class="menu-item_img">
                                <img src="{{ asset('assets/frontend/image/kosalai/tag-2.png') }}" alt="">
                            </div>
                            <div class="menu-item_content">
                                <a href="javascript:void(0);">
                                    <h3 class="menu-item_title">Cow Care, Community Love</h3>
                                </a>
                                <p class="menu-item_desc">Discover how we prioritize the welfare of cows and promote a
                                    culture of kindness towards all beings, while also providing free milk for children
                                    and engaging in community outreach through various events.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="menu-item style2">
                            <div class="menu-item_img">
                                <img src="{{ asset('assets/frontend/image/kosalai/tag-3.png') }}" alt="">
                            </div>
                            <div class="menu-item_content">
                                <a href="javascript:void(0);">
                                    <h3 class="menu-item_title">Cows, Children, and Community</h3>
                                </a>
                                <p class="menu-item_desc">Learn about our dedication to saving and not killing cows,
                                    providing free milk to young children, and supporting the community through various
                                    events, including weekly poojas and annadhananam.</p>
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
