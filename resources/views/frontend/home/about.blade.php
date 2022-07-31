<section class="page-section" id="about">
    <div class="container relative">
        <h2 class="section-title font-alt align-left mb-70 mb-sm-40">
                ABOUT COMPANY
            <a target="_blank" href="{{ route('about_us') }}" class="section-more right"> 
                More About Us <i class="fa fa-angle-right"></i>
            </a>
        </h2>
        <div class="section-text">
            <div class="row">
                <div class="col-md-2 col-12"></div>
                <div class="col-md-5 col-12">
                    <p>
                        {{ __('about_us.para_1') }}
                    </p>
                </div>
                <div class="col-md-5 col-12">
                    <p>
                        {{ __('about_us.para_2') }}
                    </p>
                </div>
                {{-- <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">{{ __('home_page.about_col_1') }}</div>
                <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">{{ __('home_page.about_col_2') }}</div>
                <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">{{ __('home_page.about_col_3') }}</div> --}}
            </div>
        </div>
    </div>
</section>
