@include('components.header')

<body>

    {{-- @include('components.preloader') --}}

    @include('components.menu')

    <!-- Breadcumb -->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/frontend/img/breadcumb/breadcumb-bg.jpg') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Feed Back</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html.htm">Home</a></li>
                    <li>Feed Back</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Contact Area -->
    <div class="space-top">
    </div>
    <div class="space-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form autocomplete="off" method="POST" action="{{ route('feedback.store') }}" class="contact-form style3" id="contact-form">
                        @csrf
                        <h2 class="form-title">Feed Back</h2>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <i class="fal fa-user"></i>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name *" required>
                            </div>
                            <div class="form-group col-md-6">
                                <i class="fa-regular fa-phone"></i>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your email *" required>
                            </div>
                            <div class="form-group col-12">
                                <i class="fa-thin fa-pencil"></i>
                                <textarea name="message" id="message" cols="30" rows="3" class="form-control style3" placeholder="Your Feed Back Message *" required></textarea>

                            </div>
                            <div class="contact-btn col-12 text-center">
                                <button type="submit" class="as-btn shadow-none">Send Feed Back</button>
                            </div>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')

    @include('components.script')

</body>

</html>
