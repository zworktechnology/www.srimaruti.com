@include('components.header')

<body>

    {{-- @include('components.preloader') --}}

    @include('components.menu')

    <!-- Breadcumb -->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/frontend/img/breadcumb/breadcumb-bg.jpg') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Sri Mass Trust</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Trust</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- About Area -->
    <div class="space" id="about-sec">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="img-box1 style5">
                        <div class="img1">
                            <img class="image_1" src="{{ asset('assets/frontend/image/Sri mas trust.png') }}" alt="About">
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="title-area mb-0 mt-n1 mr-50">
                        <span class="sub-title">SINCE 2004</span>
                        <h2 class="sec-title mr-60">From Humble Beginnings to National Recognition</h2>
                        <p class="mb-20">At Sri Mass Trust, we believe that the traditional ways of life have much to teach us about living in harmony with nature and with each other. We understand the importance of respecting and preserving our cultural heritage, and we work tirelessly to ensure that our traditions and customs are not lost in the modern world.</p>
                        <p class="mb-0">Our commitment to the care and protection of cows is central to our mission. We believe that cows are sacred creatures that deserve our love and respect. Our team of dedicated caretakers ensures that our cows are treated with the utmost care and attention, and that they are provided with everything they need to live happy and healthy lives.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- History Area -->
    <div class=" history-timeline-area">
        <div class="history-timeline">
            <div class="history-center-line"><img src="{{ asset('assets/frontend/image/shape/line_shape.svg') }}" alt=""></div>
            <div class="history-timeline_content">

                <div class="history-timeline_article">
                    <div class="history-content-left-wrapp">
                        <div class="history-content-left">
                            <h3 class="history-title">Start small</h3>
                            <p class="history-desc">In 2004, Sri Mass Trust was founded with a vision to preserve and promote traditional works and take care of cows through our organization, Kosaalai. At the time, we had a small team of passionate individuals who were dedicated to making a positive impact in our community.</p>
                        </div>
                    </div>
                    <div class="history-content-right-wrapp">
                        <div class="content-right">
                            <img src="{{ asset('assets/frontend/img/normal/history_1_1.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="meta-date">
                        <span class="date">2004</span>
                    </div>
                </div>

                <div class="history-timeline_article">
                    <div class="history-content-left-wrapp">
                        <div class="history-content-left">
                            <img src="{{ asset('assets/frontend/img/normal/history_1_2.jpg') }}" alt="">

                        </div>
                    </div>
                    <div class="history-content-right-wrapp">
                        <div class="content-right">
                            <h3 class="history-title">Grown Significantly</h3>
                            <p class="history-desc">By 2012, Sri Mass Trust had grown significantly. We had expanded our reach and were working with more communities to provide education and training on traditional methods of farming and animal husbandry. Our team had grown, and we were able to provide more support and assistance to those in need.</p>
                        </div>
                    </div>
                    <div class="meta-date">
                        <span class="date">2012</span>
                    </div>
                </div>

                <div class="history-timeline_article">
                    <div class="history-content-left-wrapp">
                        <div class="history-content-left">
                            <h3 class="history-title">Become Big</h3>
                            <p class="history-desc">In 2018, Sri Mass Trust had become a well-known and respected organization in our region. We had developed strong partnerships with local businesses and community organizations, which helped us to expand our impact even further. Our team had grown once again, and we were able to take on larger projects and initiatives.</p>
                        </div>
                    </div>
                    <div class="history-content-right-wrapp">
                        <div class="content-right">
                            <img src="{{ asset('assets/frontend/img/normal/history_1_3.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="meta-date">
                        <span class="date">2018</span>
                    </div>
                </div>

                <div class="history-timeline_article">
                    <div class="history-content-left-wrapp">
                        <div class="history-content-left">
                            <img src="{{ asset('assets/frontend/img/normal/history_1_4.jpg') }}" alt="">

                        </div>
                    </div>
                    <div class="history-content-right-wrapp">
                        <div class="content-right">
                            <h3 class="history-title">Current</h3>
                            <p class="history-desc">As of 2023, Sri Mass Trust has continued to grow and thrive. We have become a leader in the field of traditional works and cow care, and our work has gained national recognition. We have expanded our services to include healthcare and education, and we have established a network of partners and supporters who share our vision for a better future. Our team has grown to include experts in a wide range of fields, and we are more committed than ever to making a positive impact in our community and beyond.</p>
                        </div>
                    </div>
                    <div class="meta-date">
                        <span class="date">2023</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('components.footer')

    @include('components.script')

</body>

</html>
