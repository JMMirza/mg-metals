@extends('frontend.layouts.master')

@section('content')
    @include('frontend.ez_gold.header')

    <section class="page-section">
        <div class="container relative">

            <div class="row">

                <div class="col-md-6  mb-sm-40">

                    <!-- About Project -->
                    <div class="text">

                        <h3 class="font-alt mb-30 mb-xxs-10 playfare gold">Manage your gold reserve,
Whenever & Where you want.</h3>
                        <p>
                        EZgold is a fully owned subsidiary of MG Group. EZgold APP provides a simple operation interface for personal and corporate accounts. Within the APP, members can buy, sell, specialize and extract gold wherever and whenever they want.
                        </p>

                        <div class="mt-40">
                            <a href="#" class="btn btn-mod btn-border btn-round btn-medium" target="_blank">View
                                online</a>
                        </div>

                    </div>
                    <!-- End About Project -->

                </div>

                <div class="col-md-6">

                    <!-- Work Gallery -->
                    <div class="work-full-media mt-0 white-shadow">
                        <ul class="clearlist work-full-slider owl-carousel">
                            <li>
                                <img class="lazyOwl" src="{{ asset('/frontend/images/portfolio/projects-thumb.gif') }}"
                                    data-src="{{ asset('frontend/images/portfolio/full-project-3.jpg') }}" alt="" />
                            </li>
                            <li>
                                <img class="lazyOwl" src="{{ asset('frontend/images/portfolio/projects-thumb.gif') }}"
                                    data-src="{{ asset('frontend/images/portfolio/full-project-4.jpg') }}" alt="" />
                            </li>
                        </ul>
                    </div>
                    <!-- End Work Gallery -->

                </div>

            </div>

        </div>
    </section>

    {{-- <hr class="mt-0 mb-0" /> --}}

    <section class="page-section bg-dark-alfa-70"
        data-background="{{ asset('frontend/images/full-width-images/section-bg-16.jpg') }}">
        <div class="container relative">

            <h2 class="section-title font-alt mb-70 mb-sm-40">
                Why Choose Us?
            </h2>

            <!-- Features Grid -->
            <div class="row multi-columns-row alt-features-grid">

                <!-- Features Item -->
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="alt-features-item align-center">
                        <div class="alt-features-icon">
                            <span class="icon-flag"></span>
                        </div>
                        <h3 class="alt-features-title font-alt">We’re Creative</h3>
                        <div class="alt-features-descr align-left">
                            Lorem ipsum dolor sit amet, c-r adipiscing elit.
                            In maximus ligula semper metus pellentesque mattis.
                            Maecenas volutpat, diam enim.
                        </div>
                    </div>
                </div>
                <!-- End Features Item -->

                <!-- Features Item -->
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="alt-features-item align-center">
                        <div class="alt-features-icon">
                            <span class="icon-clock"></span>
                        </div>
                        <h3 class="alt-features-title font-alt">We’re Punctual</h3>
                        <div class="alt-features-descr align-left">
                            Proin fringilla augue at maximus vestibulum.
                            Nam pulvinar vitae neque et porttitor. Praesent sed
                            nisi eleifend, lorem fermentum orci sit amet, iaculis libero.
                        </div>
                    </div>
                </div>
                <!-- End Features Item -->

                <!-- Features Item -->
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="alt-features-item align-center">
                        <div class="alt-features-icon">
                            <span class="icon-hotairballoon"></span>
                        </div>
                        <h3 class="alt-features-title font-alt">We have magic</h3>
                        <div class="alt-features-descr align-left">
                            Curabitur iaculis accumsan augue, nec finibus mauris pretium eu.
                            Duis placerat ex gravida nibh tristique porta. Nulla facilisi.
                            Suspendisse ultricies eros blandit.
                        </div>
                    </div>
                </div>
                <!-- End Features Item -->
            </div>
            <!-- End Features Grid -->

        </div>
    </section>

    {{-- <hr class="mt-0 mb-0" /> --}}

    <section class="page-section">
        <div class="container relative">
            <div class="container relative">

                <div class="row">

                    <div class="col-md-7">

                        <!-- Gallery -->
                        <div class="work-full-media mt-0 white-shadow">
                            <ul class="clearlist work-full-slider owl-carousel">
                                <li>
                                    <img class="lazyOwl" src="{{ asset('frontend/images/portfolio/projects-thumb.gif') }}"
                                        data-src="{{ asset('frontend/images/portfolio/full-project-1.jpg') }}"
                                        alt="" />
                                </li>
                                <li>
                                    <img class="lazyOwl" src="{{ asset('frontend/images/portfolio/projects-thumb.gif') }}"
                                        data-src="{{ asset('frontend/images/portfolio/full-project-2.jpg') }}"
                                        alt="" />
                                </li>
                            </ul>
                        </div>
                        <!-- End Gallery -->

                    </div>

                    <div class="col-md-5 col-lg-4 offset-lg-1">

                        <div class="row">

                            <div class="col-md-12">
                                <h2 style="font-size:30px; line-height:normal;"><span>Download the app now!</span></h2>
                                <img src="{{ asset('frontend/images/portfolio/full-project-1.jpg') }}" alt="" />
                                <h2 class="font_3" style="font-size:22px; line-height:normal;"><span
                                        style="font-size:22px;">Join EZgold&nbsp;</span><span
                                        style="font-size:24px;">community</span></h2>
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset('frontend/images/portfolio/full-project-1.jpg') }}" alt="" />
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset('frontend/images/portfolio/full-project-1.jpg') }}" alt="" />
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
