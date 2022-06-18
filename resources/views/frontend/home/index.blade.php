@extends('frontend.layouts.master')

@section('content')
    @include('frontend.home.banner')

    @include('frontend.home.about')

    <hr class="mt-0 mb-0 " />

    @include('frontend.home.services')


    <section class="page-section pt-0 pb-0 banner-section bg-dark"
        data-background="{{ asset('frontend/images/full-width-images/section-bg-2.jpg') }}">
        <div class="container relative">

            <div class="row">

                <div class="col-sm-6">

                    <div class="mt-140 mt-lg-80 mb-140 mb-lg-80">
                        <div class="banner-content">
                            <h3 class="banner-heading font-alt">{{ __('home_page.INTERESTED IN ANY OF OUR MEMBER SERVICES?') }}</h3>
                            <div class="banner-decription">{{ __('home_page.sign_up_or_login') }}</div>
                            <div class="local-scroll">
                                <a href="{{ route('customer_login') }}"
                                    class="btn btn-mod btn-w btn-medium btn-round">{{ __('home_page.signup_login') }}</a>
                                <a href="{{ route('contact_us') }}" class="btn btn-mod btn-w btn-medium btn-round">{{ __('home_page.contact_us') }}</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-sm-6 banner-image wow fadeInUp">
                    <img src="{{ asset('frontend') }}/images/promo-1.png" alt="" />
                </div>

            </div>

        </div>
    </section>

    <section class="page-section">
        <div class="container relative">

            <!-- Features Grid -->
            <div class="row alt-features-grid">

                <!-- Text Item -->
                <div class="col-md-3">
                    <div class="alt-features-item align-center">
                        <div class="alt-features-descr align-left">
                            <h4 class="mt-0 font-alt">{{ __('home_page.WORK PROCESS') }}</h4>
                            Lorem ipsum dolor sit amet, c-r adipiscing elit.
                            In maximus ligula semper metus pellentesque mattis.
                            Maecenas volutpat, diam enim.
                        </div>
                    </div>
                </div>
                <!-- End Text Item -->

                <!-- Features Item -->
                <div class="col-md-3">
                    <div class="alt-features-item align-center">
                        <div class="alt-features-icon">
                            <span class="icon-chat"></span>
                        </div>
                        <h3 class="alt-features-title font-alt">1. {{ __('home_page.DISCUSS') }}</h3>
                    </div>
                </div>
                <!-- End Features Item -->

                <!-- Features Item -->
                <div class="col-md-3">
                    <div class="alt-features-item align-center">
                        <div class="alt-features-icon">
                            <span class="icon-browser"></span>
                        </div>
                        <h3 class="alt-features-title font-alt">2. {{ __('home_page.MAKE') }}</h3>
                    </div>
                </div>
                <!-- End Features Item -->

                <!-- Features Item -->
                <div class="col-md-3">
                    <div class="alt-features-item align-center">
                        <div class="alt-features-icon">
                            <span class="icon-heart"></span>
                        </div>
                        <h3 class="alt-features-title font-alt">3. {{ __('home_page.PRODUCT') }}</h3>
                    </div>
                </div>
                <!-- End Features Item -->

            </div>
            <!-- End Features Grid -->

        </div>
    </section>

    <hr class="mt-0 mb-0" />
    @include('frontend.home.testimonials')
    @include('frontend.home.shop')
    <hr class="mt-0 mb-0" />

    @include('frontend.home.newsletter')


    <section class="page-section" id="contact">
        <div class="container relative">

            <h2 class="section-title font-alt mb-70 mb-sm-40">
                Find Us
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
                                    Call Us
                                </div>
                                <div class="ci-text">
                                    +61 3 8376 6284
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
                                    Address
                                </div>
                                <div class="ci-text">
                                    245 Quigley Blvd, Ste K
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
                                    Email
                                </div>
                                <div class="ci-text">
                                    <a href="mailto:support@bestlooker.pro">support@bestlooker.pro</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Email -->

                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="small-section bg-dark">
        <div class="container relative">

            <div class="align-center">
                <h3 class="banner-heading font-alt">Want to discuss your new project?</h3>
                <div>
                    <a href="#" class="btn btn-mod btn-w btn-medium btn-round">Lets tallk</a>
                </div>
            </div>

        </div>
    </section>
@endsection


@push('header_scripts')
@endpush

@push('footer_scripts')
@endpush
