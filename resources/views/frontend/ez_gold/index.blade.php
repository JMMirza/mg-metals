@extends('frontend.layouts.master')

@section('content')
    @include('frontend.ez_gold.header')

    <section class="page-section pad-100">
        <div class="container relative">

            <div class="row">

                <div class="col-md-6 align-self-center  mb-sm-40">

                    <!-- About Project -->
                    <div class="text">

                        <h3 class="font-alt mb-10 mb-xxs-10 playfare gold">Manage your gold reserve,<br>
Whenever & Where you want.</h3>
                        <p class="dark font-17">
                        EZgold is a fully owned subsidiary of MG Group.<br> EZgold APP provides a simple operation interface for personal and corporate accounts. Within the APP, members can buy, sell, specialize and extract gold wherever and whenever they want.
                        </p>

                        <div class="mt-40">
                            <a href="#" target="_blank">
                                <img src="{{ asset('frontend/images/app-store.png') }}" class="mr-0" style="width:150px;margin-right:30px" alt="logo">
                            </a>
                            <a href="#" target="_blank">
                                <img src="{{ asset('frontend/images/play-store.png') }}" class="mr-0" style="width:150px"  alt="logo">
                            </a>
                        </div>

                    </div>
                    <!-- End About Project -->

                </div>

                <div class="col-md-6">

                    <!-- Work Gallery -->
                    <div class="work-full-media mt-0 white-shadow">
                        <ul class="clearlist work-full-slider owl-carousel mobile-app">
                            <li>
                                <img class="lazyOwl" src="{{ asset('/frontend/images/apppic1.png') }}"
                                    data-src="{{ asset('frontend/images/apppic1.png') }}" alt="" />
                            </li>
                            <li>
                                <img class="lazyOwl" src="{{ asset('frontend/images/apppic2.png') }}"
                                    data-src="{{ asset('frontend/images/apppic2.png') }}" alt="" />
                            </li>
                            <li>
                                <img class="lazyOwl" src="{{ asset('frontend/images/apppic3.png') }}"
                                    data-src="{{ asset('frontend/images/apppic3.png') }}" alt="" />
                            </li>
                        </ul>
                    </div>
                    <!-- End Work Gallery -->

                </div>

            </div>

        </div>
    </section>

    {{-- <hr class="mt-0 mb-0" /> --}}

    <section class="page-section pad-100"
        data-background="{{ asset('frontend/images/why-banner.png') }}">
        <div class="container relative">

            <h2 style="font-size:38px;line-height:1em !important;font-weight:normal !important" class="section-title normal font-alt playfare dark mb-10  capitalize ls-none text-center">
                What can EZgold App do?<br>
                <span style="font-size:24px;">Join over a million happy users!</span>
            </h2>

            <!-- Features Grid -->
            <div class="row multi-columns-row alt-features-grid mt-3">

                
                <!-- Features Item -->
                <div class="col-sm-6 col-md-3">
                    <div class="alt-features-item align-center">
                        <h3 class="alt-features-title font-alt playfare">Purchase</h3>
                        <div class="alt-features-descr align-left bg-light">
                        Purchases are made easy through your EZgold wallet.
                        </div>
                    </div>
                </div>
                <!-- End Features Item -->
                <!-- Features Item -->
                <div class="col-sm-6 col-md-3">
                    <div class="alt-features-item align-center">
                        <h3 class="alt-features-title font-alt playfare">Cash-Out</h3>
                        <div class="alt-features-descr align-left bg-light">
                        Sell your gold through EZgold App & receive cash in your EZgold wallet.
                        </div>
                    </div>
                </div>
                <!-- End Features Item -->
                <!-- Features Item -->
                <div class="col-sm-6 col-md-3">
                    <div class="alt-features-item align-center">
                        <h3 class="alt-features-title font-alt playfare">Transfer</h3>
                        <div class="alt-features-descr align-left bg-light">
                        Transfer gold reserves to another EZgold user.
                        </div>
                    </div>
                </div>
                <!-- End Features Item -->
                <!-- Features Item -->
                <div class="col-sm-6 col-md-3">
                    <div class="alt-features-item align-center">
                        <h3 class="alt-features-title font-alt playfare">Extract</h3>
                        <div class="alt-features-descr align-left bg-light">
                        A number of exquisite solid gold products for you to choose from.
                        </div>
                    </div>
                </div>
                <!-- End Features Item -->
            </div>
            <!-- End Features Grid -->

        </div>
    </section>

    {{-- <hr class="mt-0 mb-0" /> --}}

    <section class="page-section pad-100">
        <div class="container relative">
            <div class="container relative">

                <div class="row">

                    <div class="col-md-6 align-self-center col-12">

                    <img src="{{ asset('frontend/images/person-withapp.png') }}" alt="" />

                    </div>

                    <div class="col-md-6 align-self-center">

                        <div class="row m-0">

                            <div class="col-md-12 text-center">
                                <h2 class="playfare dark bold" style="font-size:30px; line-height:normal;"><span>Download the app now!</span></h2>
                                <img src="{{ asset('frontend/images/download-scan.png') }}" alt="" />
                                <h3 class="playfare dark" style="font-size:22px;margin-top:10px;">Join EZgold community</h3>
                            </div>
                            <div class="col-md-4 col-12 text-center mt-3">
                                <img src="{{ asset('frontend/images/whatsapp-scan.png') }}" style="height: 115px; margin-bottom: 10px;" alt="" />
                                <h3 class="playfare gold" style="font-size:16px;">Whatsapp</h3>
                            </div>
                            <div class="col-md-4 col-12 text-center mt-3">
                                <img src="{{ asset('frontend/images/wechat-scan.png') }}" style="height: 115px; margin-bottom: 10px;" alt="" />
                                <h3 class="playfare gold" style="font-size:16px;">We Chat</h3>
                            </div>
                            <div class="col-md-4 col-12 text-center mt-3">
                                <img src="{{ asset('frontend/images/line-scan.png') }}" style="height: 115px; margin-bottom: 10px;" alt="" />
                                <h3 class="playfare gold" style="font-size:16px;">Line</h3>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection


@push('header_scripts')
@endpush

@push('footer_scripts')
@endpush
