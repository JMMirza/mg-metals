@extends('frontend.layouts.master')

@section('content')
    @include('frontend.home.banner')

    @include('frontend.home.about')

    <hr class="mt-0 mb-0 " />

    @include('frontend.home.services')


    <section class="page-section pt-0 pb-0 banner-section bg-dark bg-dark-alfa-50"
        data-background="{{ asset('frontend/images/banners/banner.jpg') }}">
        <div class="container relative">

            <div class="row">

                <div class="col-sm-12">

                    <div class="mt-140 mt-lg-80 mb-140 mb-lg-80">
                        <div class="banner-content text-center">
                            <h3 class="banner-heading font-alt bold">
                                {{ __('home_page.INTERESTED IN ANY OF OUR MEMBER SERVICES?') }}</h3>
                            <div class="banner-decription">{{ __('home_page.sign_up_or_login') }}</div>
                            <div class="local-scroll">
                                <a href="{{ route('customer_login') }}"
                                    class="btn btn-mod btn-w btn-medium btn-round">{{ __('home_page.signup_login') }}</a>
                                <a href="{{ route('contact_us') }}"
                                    class="btn btn-mod btn-w btn-medium btn-round">{{ __('home_page.contact_us') }}</a>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </section>

    <section class="page-section">
        <div class="container relative">
            <h2 class="section-title font-alt mb-70 mb-sm-40">{{ __('home_page.why_choose_us') }}</h2>
            <div class="row alt-features-grid">

                <div class="col-md-4">
                    <div class="alt-features-item align-center">
                        <div class="alt-features-descr align-center">
                        <div class="alt-tabs-icon">
                        
                            <img src="{{ asset('frontend/images/icons/credential.png') }}" style="width:80px;height:auto;" alt="image" class="icon">
                        </div>
                            <h4 class="heading">CREDENTIAL</h4>
                            {{ __('home_page.choose_us_1') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="alt-features-item align-center">
                        <div class="alt-features-descr align-center">
                        <div class="alt-tabs-icon">
                        
                        <img src="{{ asset('frontend/images/icons/sustain.png') }}" style="width:80px;height:auto;" alt="image" class="icon">
                    </div>
                        <h4  class="heading">SUSTAINABILITY</h4>
                            {{ __('home_page.choose_us_2') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="alt-features-item align-center">
                        <div class="alt-features-descr align-center">
                        <div class="alt-tabs-icon">
                        
                        <img src="{{ asset('frontend/images/icons/credibility.png') }}" style="width:80px;height:auto;" alt="image" class="icon">
                    </div>
                        <h4  class="heading">CREDIBILITY</h4>
                            {{ __('home_page.choose_us_3') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <hr class="mt-0 mb-0" />
    @include('frontend.home.testimonials')
    @include('frontend.home.shop')
    <hr class="mt-0 mb-0" />

    @include('frontend.home.newsletter')


    <section class="page-section" id="contact" style="padding:50px 0px !important">
        <div class="container relative">

            <h2 class="section-title font-alt mb-70 mb-sm-40">
                {{ __('home_page.Find us') }}
            </h2>

            <div class="row">

                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                    <div class="row">

                        <!-- Phone -->
                        <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                            <div class="contact-item">
                                <div class="ci-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="ci-title font-alt">
                                    {{ __('home_page.call_us') }}
                                </div>
                                <div class="ci-text">
                                    (852) 3998 4916
                                </div>
                            </div>
                        </div>
                        <!-- End Phone -->

                        <!-- Address -->
                        <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                            <div class="contact-item">
                                <div class="ci-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="ci-title font-alt">
                                    {{ __('home_page.Address') }}
                                </div>
                                <div class="ci-text">
                                    Unit F, 18F, MG Tower, 133 Hoi Bun Road, Kwun Tong, Kowloon, Hong Kong
                                </div>
                            </div>
                        </div>
                        <!-- End Address -->

                        <!-- Email -->
                        <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                            <div class="contact-item">
                                <div class="ci-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="ci-title font-alt">
                                    {{ __('home_page.Email') }}
                                </div>
                                <div class="ci-text">
                                    <a href="mailto:account@mgmetals.com.hk">account@mgmetals.com.hk</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Email -->

                    </div>
                </div>

            </div>

        </div>
    </section>

    {{-- <section class="small-section bg-dark">
        <div class="container relative">

            <div class="align-center">
                <h3 class="banner-heading font-alt">Want to discuss your new project?</h3>
                <div>
                    <a href="#" class="btn btn-mod btn-w btn-medium btn-round">Lets tallk</a>
                </div>
            </div>

        </div>
    </section> --}}
@endsection


@push('header_scripts')
@endpush

@push('footer_scripts')
@endpush
