@include('components.header')

<body>

    {{-- @include('components.preloader') --}}

    @include('components.menu')

    <div class="breadcumb-wrapper " data-bg-src="assets/img/breadcumb/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Privacy Policy</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Privacy Policy</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="space">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-xl-12">
                    <div>
                        <div class="accordion-area accordion" id="faqAccordion">
                            <div class="accordion-card active">
                                <div class="accordion-header" id="collapse-item-1">
                                    <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-1" aria-expanded="true"
                                        aria-controls="collapse-1">Privacy Policy</button>
                                </div>
                                <div id="collapse-1" class="accordion-collapse collapse show"
                                    aria-labelledby="collapse-item-1" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">At Maruthi Resort, we are committed to protecting the
                                            privacy and confidentiality of our guests' personal information. This policy
                                            outlines how we collect, use, and disclose your personal information in
                                            accordance with applicable laws and regulations.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-card">
                                <div class="accordion-header" id="collapse-item-2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-2" aria-expanded="false"
                                        aria-controls="collapse-2">Information We Collect</button>
                                </div>
                                <div id="collapse-2" class="accordion-collapse collapse "
                                    aria-labelledby="collapse-item-2" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">We collect personal information such as your name, contact
                                            details, payment information, and preferences when you make a reservation,
                                            check-in to our resort, or use our services. We may also collect information
                                            through third-party sources such as travel agents or online booking
                                            platforms.
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-card ">
                                <div class="accordion-header" id="collapse-item-3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-3" aria-expanded="false"
                                        aria-controls="collapse-3">How We Use Your Information
                                    </button>
                                </div>
                                <div id="collapse-3" class="accordion-collapse collapse "
                                    aria-labelledby="collapse-item-3" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">We use your personal information to provide you with the
                                            services you have requested, to process your payment, to communicate with
                                            you about your reservation or our services, and to improve our operations
                                            and customer service. We may also use your information for marketing
                                            purposes, but only with your consent.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-card">
                                <div class="accordion-header" id="collapse-item-4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-4" aria-expanded="false"
                                        aria-controls="collapse-4">How We Protect Your Information</button>
                                </div>
                                <div id="collapse-4" class="accordion-collapse collapse "
                                    aria-labelledby="collapse-item-4" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">We implement appropriate measures to protect your personal
                                            information from unauthorized access, disclosure, or use. We restrict access
                                            to your information to authorized personnel only and use secure technologies
                                            to transmit and store your data.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-card">
                                <div class="accordion-header" id="collapse-item-5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-5" aria-expanded="false"
                                        aria-controls="collapse-5">Sharing Your Information</button>
                                </div>
                                <div id="collapse-5" class="accordion-collapse collapse"
                                    aria-labelledby="collapse-item-5" data-bs-parent="#qusAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">We may share your personal information with our third-party
                                            service providers such as payment processors, IT providers, and marketing
                                            agencies, but only to the extent necessary for them to provide their
                                            services. We do not sell or rent your personal information to third parties.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-card">
                                <div class="accordion-header" id="collapse-item-6">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-6" aria-expanded="false"
                                        aria-controls="collapse-6">Cancellation Policy</button>
                                </div>
                                <div id="collapse-6" class="accordion-collapse collapse "
                                    aria-labelledby="collapse-item-6" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">We understand that plans may change, and we offer a 24-hour
                                            cancellation policy for all reservations. You may cancel your reservation
                                            without penalty if you do so at least 24 hours before your scheduled
                                            check-in time. If you cancel within 24 hours of your check-in time, a
                                            cancellation fee may apply.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-card ">
                                <div class="accordion-header" id="collapse-item-7">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-7" aria-expanded="false"
                                        aria-controls="collapse-7">Cookies and tracking technologies</button>
                                </div>
                                <div id="collapse-7" class="accordion-collapse collapse "
                                    aria-labelledby="collapse-item-7" data-bs-parent="#qusAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">We use cookies and other tracking technologies on our
                                            website to personalize content and ads, to provide social media features,
                                            and to analyze our traffic. By using our website, you consent to the use of
                                            these technologies. Personal information storage and protection We take the
                                            protection of your personal information
                                            seriously and have implemented appropriate measures to safeguard it.
                                            Personal information is stored securely and access is restricted to
                                            authorized personnel only.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-card ">
                                <div class="accordion-header" id="collapse-item-8">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-8" aria-expanded="false"
                                        aria-controls="collapse-8">Accessing, updating, and deleting personal
                                        information</button>
                                </div>
                                <div id="collapse-8" class="accordion-collapse collapse "
                                    aria-labelledby="collapse-item-8" data-bs-parent="#qusAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">You have the right to access, update, and delete your
                                            personal information at any time. To do so, please contact us at Call: +91 96594 64543 | Mail to: info@srimaruti.com. Sharing personal information with third parties We may share your personal information with third-party service providers to
                                            provide you with the services you have requested, such as payment processing
                                            or transportation services. We do not sell or rent your personal information
                                            to third parties. Legal basis for processing personal information We process your personal information based on your consent, as necessary to
                                            fulfill our contractual obligations to you, or as necessary to comply with
                                            legal obligations.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-card ">
                                <div class="accordion-header" id="collapse-item-9">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-9" aria-expanded="false"
                                        aria-controls="collapse-9">Updating the privacy policy</button>
                                </div>
                                <div id="collapse-9" class="accordion-collapse collapse "
                                    aria-labelledby="collapse-item-9" data-bs-parent="#qusAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">We may update this privacy policy from time to time to reflect changes in our practices or applicable laws. We will notify you of any material changes to the privacy policy by posting a notice on our website or by other means, if required by law.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-card ">
                                <div class="accordion-header" id="collapse-item-10">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-10" aria-expanded="false"
                                        aria-controls="collapse-10">Contact Us</button>
                                </div>
                                <div id="collapse-10" class="accordion-collapse collapse "
                                    aria-labelledby="collapse-item-10" data-bs-parent="#qusAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">If you have any questions or concerns about our privacy policy or the handling of your personal information, please contact us at Call: +91 96594 64543 | Mail to: info@srimaruti.com .
                                        </p>
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
