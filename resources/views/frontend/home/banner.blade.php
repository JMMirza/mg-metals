<section class="home-section bg-gray parallax-2 web-banner" data-background="{{ asset('frontend/images/banner.png') }}" id="home">
    <div class="js-height-full">

        <!-- Hero Content -->
        <div class="home-content container">
            <div class="home-text">

                <h1 class="hs-line-8 font-alt mb-50 mb-xs-30 text-white">{{ __('home_page.since_2001') }}</h1>
                <h2 class="hs-line-11 font-alt mb-50 mb-xs-30 text-white">{{ __('home_page.mg_metals') }}</h2>

                <div class="local-scroll">
                    <a href="{{ route('contact_us') }}"
                        class="btn btn-mod btn-medium btn-round d-none d-sm-inline-block">{{ __('home_page.contact_us') }}</a>
                    <span class="d-none d-sm-inline-block">&nbsp;</span>
                    <a href="{{ route('shop') }}"
                        class="btn btn-mod btn-medium btn-round">{{ __('home_page.purchase') }}</a>
                </div>

            </div>
        </div>
        <!-- End Hero Content -->

        <!-- Scroll Down -->
        <div class="local-scroll">
            <a href="#about" class="scroll-down"><i class="fa fa-angle-down scroll-down-icon"></i><span
                    class="sr-only">Scroll to the next section</span></a>
        </div>
        <!-- End Scroll Down -->

    </div>
</section>


<section class="home-section bg-gray parallax-2 mobile-banner" data-background="{{ asset('frontend/images/mobile-banner.jpeg') }}"id="home">

    <div class="js-height-full">

        <!-- Hero Content -->
        <div class="home-content container">
            <div class="home-text">

                <h1 class="hs-line-8 font-alt mb-50 mb-xs-30 text-white">{{ __('home_page.since_2001') }}</h1>
                <h2 class="hs-line-11 font-alt mb-50 mb-xs-30 text-white">{{ __('home_page.mg_metals') }}</h2>

                <div class="local-scroll">
                    <a href="{{ route('contact_us') }}"
                        class="btn btn-mod btn-medium btn-round d-none d-sm-inline-block">{{ __('home_page.contact_us') }}</a>
                    <span class="d-none d-sm-inline-block">&nbsp;</span>
                    <a href="{{ route('shop') }}"
                        class="btn btn-mod btn-medium btn-round">{{ __('home_page.purchase') }}</a>
                </div>

            </div>
        </div>
        <!-- End Hero Content -->

        <!-- Scroll Down -->
        <div class="local-scroll">
            <a href="#about" class="scroll-down"><i class="fa fa-angle-down scroll-down-icon"></i><span
                    class="sr-only">Scroll to the next section</span></a>
        </div>
        <!-- End Scroll Down -->

    </div>
</section>
