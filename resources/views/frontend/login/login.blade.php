@extends('frontend.layouts.master')


@section('content')
    <section class="small-section bg-dark-lighter">
        <div class="relative container align-left">

            <div class="row">

                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">{{ __('home_page.login') }}</h1>
                    {{-- <div class="hs-line-4 font-alt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing
                    </div> --}}
                </div>

                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="{{ route('home') }}">{{ __('home_page.home') }}</a>&nbsp;/&nbsp;<span>{{ __('home_page.login') }}</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="container center-aligned">

        <div class="row">

            <div class="col-md-12">

                <ul class="nav nav-tabs tpl-tabs animate" role="tablist">

                    <li class="nav-item">
                        <a href="#item-1" aria-controls="item-1" class="nav-link active"
                            data-bs-toggle="tab" role="tab" aria-selected="true">Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#item-2" aria-controls="item-2" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">Register
                        </a>
                    </li>

                    

                </ul>
                <div class="tab-content tpl-tabs-cont section-text">

                    <div class="tab-pane fade active show" role="tabpanel" id="item-1" role="tabpanel">
                        <div class="card card-default form-card">
                            <div class="card-header">
                                Sec#1 <span>Account Info</span>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="login_email" name="email" placeholder="Enter Email"
                                            value="{{ old('email') }}" required autofocus>
                                        <div class="invalid-feedback">Email is required!</div>
                
                                    </div>
                
                                    <div class="mb-3">
                                        <div class="float-end">
                                            <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
                                        </div>
                                        <label class="form-label" for="password-input">Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" class="form-control pe-5" placeholder="Enter password"
                                                id="password-input" value="{{ old('password') }}" name="password" required>
                                            <div class="invalid-feedback">Password is required!</div>
                
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                                                type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>
                
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="auth-remember-check"
                                            name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>
                
                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Sign In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="item-2" role="tabpanel">
                        <div class="card card-default form-card">
                            <div class="card-header">
                                Sec#1 <span>Account Info</span>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('customer-register-account') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" autocomplete="name" autofocus
                                                    placeholder="{{ __('Complete Name') }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <input id="email" type="email" placeholder="{{ __('Email Address') }}"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email">
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                                    autocomplete="new-password" placeholder="{{ __('Password') }}">
                
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required
                                                    autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <button class="btn btn-custom" disabled="true">Previous</button>
                                        <div class="ml-auto">
                                            <button class="btn btn-default">Cancel</button>
                                            <button class="btn btn-custom">Next</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>



    </div>
@endsection
