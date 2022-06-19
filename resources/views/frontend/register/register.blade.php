@extends('frontend.layouts.master')


@section('content')
    <section class="small-section bg-dark-lighter">
        <div class="relative container align-left">

            <div class="row">

                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">My Account</h1>
                    <div class="hs-line-4 font-alt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing
                    </div>
                </div>

                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="#">Home</a>&nbsp;/&nbsp;<a href="#">Pages</a>&nbsp;/&nbsp;<span>My Account</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="container center-aligned">
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
@endsection
