@include('components.header')

<body>

    {{-- @include('components.preloader') --}}

    @include('components.menu')

    <!-- Breadcumb -->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/frontend/img/breadcumb/breadcumb-bg.jpg') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Contact Us</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Contact Area -->
    <div class="space-top">
        <div class="container">
            <div class="contact-info-wrap mb-60">
                <span class="contact-title">Our Branches<span class="shape"></span></span>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <div class="contact-info_icon">
                                <i class="fat fa-location-dot"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="contact-info_title">Srirangam</h4>
                                <span class="contact-info_text">No. 122, South Chitra Street, Srirangam, Tiruchirappalli.<br><br><a href="mailto:samayapuram@srimaruti.com" class="info-box_link">samayapuram@srimaruti.com
                                    </a><a href="tel:+919659464543" class="info-box_link">+91 96594 64543</a>
                                    <a href="tel:04312435749" class="info-box_link">(0431) 2435 749</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <div class="contact-info_icon">
                                <i class="fat fa-location-dot"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="contact-info_title">Samayapuram</h4>
                                <span class="contact-info_text">No. 1, Sakthi Avenue, Koil Marriage Hall Opp, Samayapuram, Tiruchirappalli.<br><br><a href="mailto:samayapuram@srimaruti.com" class="info-box_link">samayapuram@srimaruti.com
                                    </a><a href="tel:+919659464249" class="info-box_link">+91 96594 64249</a>
                                    <a href="tel:04312670060" class="info-box_link">(0431) 2670 060</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <div class="contact-info_icon">
                                <i class="fat fa-location-dot"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="contact-info_title">Gunaseelam</h4>
                                <span class="contact-info_text">No. 4, Mass Garden, Salem Main Road, Gunaseelam, Tiruchirappalli.<br><br><a href="mailto:gunaseelam@srimaruti.com" class="info-box_link">gunaseelam@srimaruti.com
                                    </a><a href="tel:+919025343955" class="info-box_link">+91 90253 43955</a>
                                    <a href="tel:04316275275" class="info-box_link">(0431) 6275 275</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form autocomplete="off" method="POST" action="{{ route('contact.store') }}" class="contact-form style3" id="contact-form">
                        @csrf
                        <h2 class="form-title">Get In touch</h2>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <i class="fal fa-user"></i>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name *" required>
                            </div>
                            <div class="form-group col-md-6">
                                <i class="fa-regular fa-phone"></i>
                                <input type="tel" class="form-control" name="phone_number" id="number" placeholder="Phone Number *" required>
                            </div>
                            <div class="form-group col-md-12">
                                <i class="fal fa-envelope"></i>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your email *" required>
                            </div>
                            <div class="form-group col-12">
                                <i class="fa-thin fa-pencil"></i>
                                <textarea name="message" id="message" cols="30" rows="3" class="form-control style3" placeholder="Your Message *" required></textarea>

                            </div>
                            <div class="contact-btn col-12 text-center">
                                <button type="submit" class="as-btn shadow-none">Send Message Now</button>
                            </div>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="map-sec">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3644.7310056272386!2d89.2286059153658!3d24.00527418490799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe9b97badc6151%3A0x30b048c9fb2129bc!2sAngfuzsoft!5e0!3m2!1sen!2sbd!4v1651028958211!5m2!1sen!2sbd" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    @include('components.footer')

    @include('components.script')

</body>

</html>
