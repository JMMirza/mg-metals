@extends('frontend.layouts.master')

@section('content')
    @include('frontend.about_us.header')

    <section class="page-section" id="about">
        <div class="container relative">

            <div class="section-text mb-60 mb-sm-40">
                <div class="row">
                    <div class="col-sm-12 mb-sm-50 mb-xs-30">
                        <h4 class="mt-0 font-alt">{{ __('about_us.h1') }}</h4>
                        <p>
                            {{ __('about_us.para_1') }}
                        </p>
                        <p>
                            {{ __('about_us.para_2') }}
                        </p>
                        <p>
                            {{ __('about_us.para_4') }}
                        </p>
                        <p>
                            {{ __('about_us.para_5') }}
                        </p>
                        <p><strong>{{ __('about_us.para_6') }}</strong></p>
                        <p>{{ __('about_us.para_7') }}</p>
                        <p>{{ __('about_us.para_8') }}</p>
                        <p>{{ __('about_us.para_9') }}</p>
                        <p><strong>{{ __('about_us.para_10') }}</strong></p>
                        <p> {{ __('about_us.para_11') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
