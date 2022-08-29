@extends('frontend.layouts.master')

@section('content')
    @include('frontend.about_us.header')

    <section class="page-section" id="about">
        <div class="container relative">
            <h2 class="section-title font-alt mb-50 mt-40 mb-sm-40">{{ __('about_us.h1') }}</h2>
            <div class="section-text mb-60 mb-sm-40">
                <div class="row">
                    <div class="col-sm-6 px-md-5">
                        <p style="color:#254345">{{ __('about_us.para_01') }}</p>
                        {{-- <p style="color:#254345" class="mb-0">{{ __('about_us.para_02') }}</p> --}}
                        {{-- <p style="color:#254345">{{ __('about_us.para_03') }}</p> --}}
                    </div>
                    <div class="col-sm-6 px-md-5">
                        <p style="color:#254345">{{ __('about_us.para_04') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container relative mt-40">
            <h2 class="section-title font-alt mb-50 mt-50 mb-sm-40">{{ __('about_us.h2') }}</h2>
            <div class="section-text mb-50 mt-40 mb-sm-40">
                <div class="row">
                    <div class="col-sm-6 px-md-5">
                        <p style="color:#254345">{{ __('about_us.para_1') }}</p>
                        <p style="color:#254345">{{ __('about_us.para_2') }}</p>
                    </div>
                    <div class="col-sm-6 px-md-5">
                        <p style="color:#254345">{{ __('about_us.para_3') }}</p>
                        <p style="color:#254345">{{ __('about_us.para_06') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container relative mt-40">
            <div class="section-text mb-60 mb-sm-40">
                <div class="row">
                    <div class="col-sm-6 px-md-5">
                        <h2 class="section-title font-alt mb-50 mt-30 ">{{ __('about_us.h3') }}</h2>
                        <p style="color:#254345">{{ __('about_us.para_7') }}</p>
                        <p style="color:#254345">{{ __('about_us.para_8') }}</p>
                        <p style="color:#254345">{{ __('about_us.para_9') }}</p>
                    </div>
                    <div class="col-sm-6 px-md-5">
                        <h2 class="section-title font-alt mb-50 mt-30 ">{{ __('about_us.h4') }}</h2>
                        <div class="d-flex">
                            <img src="{{ asset('frontend/images/milestone.png') }}"
                                style="height: 26px;margin-right: 15px;" alt="logo">
                            <p style="color:#254345">{{ __('about_us.para_4') }}</p>
                        </div>
                        <div class="d-flex">
                            <img src="{{ asset('frontend/images/milestone.png') }}"
                                style="height: 26px;margin-right: 15px;" alt="logo">
                            <p style="color:#254345">{{ __('about_us.para_5') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
