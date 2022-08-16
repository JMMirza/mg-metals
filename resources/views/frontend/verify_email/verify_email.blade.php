@extends('frontend.layouts.master')


@section('content')
    <section class="small-section bg-dark-lighter page-header-global" data-background="{{ asset('frontend/images/banner1.png') }}">
        <div class="relative container align-left">

            <div class="row">

                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">{{ __('home_page.login') }}</h1>
                    {{-- <div class="hs-line-4 font-alt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing
                    </div> --}}
                </div>

                <!-- <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a
                            href="{{ route('home') }}">{{ __('home_page.home') }}</a>&nbsp;/&nbsp;<span>{{ __('home_page.login') }}</span>
                    </div>
                </div> -->
            </div>

        </div>
    </section>
    @include('layouts.flash_message')

    <div class="container center-aligned">
        <div class="card card-default form-card">
            <div class="card-header">
                <span>Account Verification</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('verify-code') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
                            {{-- <div class="form-group"> --}}
                            <input type="hidden" name="email" value="{{ $email }}">
                            <input id="code" type="code" placeholder="{{ __('Verification Code') }}"
                                class="form-control @error('code') is-invalid @enderror" name="code"
                                value="{{ old('code') }}" required>

                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- </div> --}}
                        </div>
                    </div>
                    <div class="footer mt-3">
                        <button class="= btn btn-custom w-100" type="submit">Verify Code</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
