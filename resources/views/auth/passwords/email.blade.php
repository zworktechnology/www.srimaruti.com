@extends('layouts.guest')

@section('content')
<div class="account-pages my-5  pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div>
                    <a href="javascript:void(0);" class="mb-5 d-block auth-logo">
                        <img src="{{ asset('assets/backend/images/logo-dark.png') }}" alt="" height="22" class="logo logo-dark">
                        <img src="{{ asset('assets/backend/images/logo-light.png') }}" alt="" height="22" class="logo logo-light">
                    </a>
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Reset Password</h5>
                                <p class="text-muted">Reset Password now.</p>
                            </div>
                            <div class="p-2 mt-4">
                                @if (session('status'))
                                <div class="alert alert-success text-center mb-4" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}" autocomplete="off">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="useremail">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mt-3 text-end">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Reset</button>
                                    </div>


                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Remember It ? <a href="{{ route('login') }}" class="fw-medium text-primary"> Signin </a></p>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
@endsection
