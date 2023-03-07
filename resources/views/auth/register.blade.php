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
                            <h5 class="text-primary">Register Account</h5>
                            <p class="text-muted">Get your account now.</p>
                        </div>
                        <div class="p-2 mt-4">
                            <form method="POST" action="{{ route('register') }}" autocomplete="off">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label" for="Name">Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="Email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Enter email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="Password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="Confirm Password">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Enter confirm password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mt-3 text-end">
                                    <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Register</button>
                                </div>

                                <div class="mt-4 text-center">
                                    <p class="text-muted mb-0">Already have an account ? <a href="{{ route('login') }}" class="fw-medium text-primary"> Login</a></p>
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
