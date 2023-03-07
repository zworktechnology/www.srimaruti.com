@extends('layouts.guest')

@section('content')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <a href="javascript:void(0);" class="mb-5 d-block auth-logo">
                        <img src="{{ asset('assets/backend/images/logo-dark.png') }}" alt="" height="22" class="logo logo-dark">
                        <img src="{{ asset('assets/backend/images/logo-light.png') }}" alt="" height="22" class="logo logo-light">
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="card-body p-4">
                        <div class="text-center mt-2">
                            <h5 class="text-primary">Welcome Back !</h5>
                            <p class="text-muted">Sign in to continue.</p>
                        </div>
                        <div class="p-2 mt-4">
                            <form method="POST" action="{{ route('login') }}" autocomplete="off">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label" for="username">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Enter email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="float-end">
                                        <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
                                    </div>
                                    <label class="form-label" for="userpassword">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mt-3 text-end">
                                    <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log In</button>
                                </div>

                                <div class="mt-4 text-center">
                                    <p class="mb-0">Don't have an account ? <a href="{{ route('register') }}" class="fw-medium text-primary"> Signup now </a> </p>
                                </div>
                            </form>
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
