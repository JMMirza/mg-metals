<section class="page-section" id="services">
    <div class="container relative">

        <h2 class="section-title font-alt mb-50 mb-sm-40">{{ __('home_page.service') }}</h2>

        <!-- Nav tabs -->
        <ul role="tablist" class="nav nav-tabs tpl-alt-tabs font-alt pt-30 pt-sm-0 pb-30 pb-sm-0">
            <li>
                <a href="#service-branding" class="nav-link active" data-bs-toggle="tab" role="tab"
                    aria-selected="true">

                    <div class="alt-tabs-icon">
                        
                        <img src="{{ asset('frontend/images/icons/phy-gold.png') }}" alt="image" class="icon">
                        <img src="{{ asset('frontend/images/icons/phy-gold-h.png') }}" alt="image" class="icon hover">
                    </div>

                    {{ __('home_page.service_title_1') }}
                </a>
            </li>
            <li>
                <a href="#service-web-design" class="nav-link" data-bs-toggle="tab" role="tab"
                    aria-selected="false">

                    <div class="alt-tabs-icon">
                        
                        <img src="{{ asset('frontend/images/icons/casting.png') }}" alt="image" class="icon">
                        <img src="{{ asset('frontend/images/icons/casting-h.png') }}" alt="image" class="icon hover">
                    </div>

                    {{ __('home_page.service_title_2') }}
                </a>
            </li>
            <li>
                <a href="#service-graphic" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">

                    <div class="alt-tabs-icon">
                        
                        <img src="{{ asset('frontend/images/icons/ex-sol.png') }}" alt="image" class="icon">
                        <img src="{{ asset('frontend/images/icons/ex-sol-h.png') }}" alt="image" class="icon hover">
                    </div>

                    {{ __('home_page.service_title_3') }}
                </a>
            </li>
            <li>
                <a href="#service-development" class="nav-link" data-bs-toggle="tab" role="tab"
                    aria-selected="false">

                    <div class="alt-tabs-icon">
                        <img src="{{ asset('frontend/images/icons/network.png') }}" alt="image" class="icon">
                        <img src="{{ asset('frontend/images/icons/network-h.png') }}" alt="image" class="icon hover">
                    </div>

                    {{ __('home_page.service_title_4') }}
                </a>
            </li>
           
        </ul>
        <!-- End Nav tabs -->
        <div class="row section-text mb-30">
            <div class="col-12 col-md-4 pr-0">
                <h3 class="playfare bold dark-light" style="font-size: 26px;line-height: 1.88em;">Every decade or so, dark clouds will fill the economic skies, and they will briefly rain gold.</h3>
                <p style="letter-spacing:0.1em;">Warren Buffett</p>
            </div>
            <div class="col-12 col-md-4">
                <p>MG Group was established in 2001. Within 10 years, our company has developed into a diversified business conglomerate-wide range of businesses from a real estate investment company. Our core businesses include a variety of financial services, real estate, entertainment, publishing, arts and cultures, education and training, multimedia and environmental protection. </p>
            </div>
            <div class="col-12 col-md-4">
                <p>As a portfolio company of MG Metals, Marigold International Bullion Dealers Limited (A member of The Chinese Gold and Silver Exchange Society, Hong Kong (CGSE)* and Gold Bullion Group Member**, License number: 023) was established in 2007. </p>
            </div>
        </div>

        <!-- Tab panes -->
        <div class="tab-content tpl-tabs-cont" style="display:none">

            <!-- Service Item -->
            <div role="tabpanel" class="tab-pane fade show active" id="service-branding">
                <div class="section-text">
                    <div class="row">
                        {{-- <div class="col-md-4 mb-md-40 mb-xs-30">
                            <blockquote class="mb-0">
                                <p>
                                    {{ __('home_page.service_desc_01') }}
                                </p>
                            </blockquote>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                            {{ __('home_page.service_desc_02') }}
                        </div> --}}
                        <div class="col-md-12 col-sm-12 mb-sm-50 mb-xs-30 text-center">
                            {{ __('home_page.service_desc_01') }}
                        </div>
                    </div>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="service-web-design">

                <div class="section-text">
                    <div class="row">
                        {{-- <div class="col-md-4 mb-md-40 mb-xs-30">
                            <blockquote class="mb-0">
                                <p>
                                    {{ __('home_page.service_desc_11') }}
                                </p>
                            </blockquote>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                            {{ __('home_page.service_desc_12') }}
                        </div> --}}

                        <div class="col-md-12 col-sm-12 mb-sm-50 mb-xs-30 text-center">
                            {{ __('home_page.service_desc_11') }}
                        </div>


                    </div>
                </div>

            </div>

            <div role="tabpanel" class="tab-pane fade" id="service-graphic">

                <div class="section-text">
                    <div class="row">
                        {{-- <div class="col-md-4 mb-md-40 mb-xs-30">
                            <blockquote class="mb-0">
                                <p>
                                    {{ __('home_page.service_desc_21') }}
                                </p>
                            </blockquote>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                            {{ __('home_page.service_desc_22') }}
                        </div> --}}
                        <div class="col-md-12 col-sm-12 mb-sm-50 mb-xs-30 text-center">
                            {{ __('home_page.service_desc_21') }}
                        </div>
                    </div>
                </div>

            </div>

            <div role="tabpanel" class="tab-pane fade" id="service-development">

                <div class="section-text">
                    <div class="row">
                        {{-- <div class="col-md-4 mb-md-40 mb-xs-30">
                            <blockquote class="mb-0">
                                <p>
                                    {{ __('home_page.service_desc_31') }}
                                </p>
                            </blockquote>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                            {{ __('home_page.service_desc_32') }}
                        </div> --}}
                        <div class="col-md-12 col-sm-12 mb-sm-50 mb-xs-30 text-center">
                            {{ __('home_page.service_desc_31') }}
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- End Tab panes -->

        <div class="align-center mb-40">
            <a href="{{ route('services') }}"
                class="section-more font-alt playfare">{{ __('home_page.VIEW ALL SERVICES') }}
                <i class="fa fa-angle-right"></i></a>
        </div>

    </div>
</section>
