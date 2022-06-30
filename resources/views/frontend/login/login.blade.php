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
                        <a
                            href="{{ route('home') }}">{{ __('home_page.home') }}</a>&nbsp;/&nbsp;<span>{{ __('home_page.login') }}</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="container center-aligned">

        <div class="row">

            <div class="col-md-12">

                <ul class="nav nav-tabs tpl-tabs animate login-tabs mb-0" role="tablist">

                    <li class="nav-item">
                        <a href="#item-1" aria-controls="item-1" class="nav-link active" data-bs-toggle="tab" role="tab"
                            aria-selected="true">Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#item-2" aria-controls="item-2" class="nav-link" data-bs-toggle="tab" role="tab"
                            aria-selected="false">Register
                        </a>
                    </li>
                </ul>
                <div class="tab-content tpl-tabs-cont section-text login-tab-content pt-0">

                    <div class="tab-pane fade active show" role="tabpanel" id="item-1" role="tabpanel">
                        <div class="card card-default form-card">
                            <div class="card-header">
                                <span>Welcome back to Login</span>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <input type="text"
                                                class="form-control @if ($errors->has('email')) is-invalid @endif"
                                                id="login_email" name="email" placeholder="{{ __('login.Email') }}"
                                                value="{{ old('email') }}" required autofocus>
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="position-relative auth-pass-inputgroup w-100">
                                                <input type="password"
                                                    class="form-control @if ($errors->has('password')) is-invalid @endif"
                                                    placeholder="{{ __('login.Password') }}" id="password-input"
                                                    value="{{ old('password') }}" name="password" required>
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </div>

                                                <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                                                    type="button" id="password-addon"><i
                                                        class="ri-eye-fill align-middle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mb-2">
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" value="" id="auth-remember-check"
                                                        name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <span></span> Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mb-2 justify-content-end">
                                                <a href="{{ route('password.request') }}" class="ml-auto">Forgot
                                                    password?</a>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="footer mt-3">
                                        <button class="= btn btn-custom w-100" type="submit">Sign In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="item-2" role="tabpanel">
                        <div class="card card-default form-card">
                            <div class="card-header">
                                <span>Create your account</span>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('customer-register-account') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <input id="name" type="text"
                                                class="form-control @if ($errors->has('name')) is-invalid @endif"
                                                name="name" value="{{ old('name') }}" autocomplete="name" autofocus
                                                placeholder="{{ __('login.Complete Name') }}">
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input id="email" type="email" placeholder="{{ __('login.Email') }}"
                                                class="form-control @if ($errors->has('email')) is-invalid @endif"
                                                name="email" value="{{ old('email') }}" required autocomplete="email">
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input id="password" type="password"
                                                class="form-control @if ($errors->has('password')) is-invalid @endif"
                                                name="password" required autocomplete="new-password"
                                                placeholder="{{ __('login.Password') }}">
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input id="password-confirm" type="password"
                                                class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif"
                                                placeholder="{{ __('login.Confirm Password') }}"
                                                name="password_confirmation" required autocomplete="new-password">
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input id="referred_by" type="text"
                                                placeholder="{{ __('login.referred_by') }}"
                                                class="form-control @if ($errors->has('referred_by')) is-invalid @endif"
                                                name="referred_by" value="{{ old('referred_by') }}" required
                                                autocomplete="referred_by">
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('referred_by') }}</strong>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="radio-inline mr-3">
                                                <input type="radio" name="customer_type" value="individual"
                                                    @if (old('customer_type') == 'individual') checked @endif>
                                                <span></span>{{ __('login.individual') }}
                                            </label>
                                            <label class="radio-inline mr-3">
                                                <input type="radio" name="customer_type" value="corporate"
                                                    @if (old('customer_type') == 'corporate') checked @endif>
                                                <span></span>{{ __('login.corporate') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <button class="btn btn-custom w-100" type="submit">Register</button>
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
