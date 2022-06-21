<section class="page-section" id="services">
    <div class="container relative">

        <h2 class="section-title font-alt mb-70 mb-sm-40">{{ __('home_page.service') }}</h2>

        <!-- Nav tabs -->
        <ul role="tablist" class="nav nav-tabs tpl-alt-tabs font-alt pt-30 pt-sm-0 pb-30 pb-sm-0">
            <li>
                <a href="#service-branding" class="nav-link active" data-bs-toggle="tab" role="tab"
                    aria-selected="true">

                    <div class="alt-tabs-icon">
                        <span class="icon-strategy"></span>
                    </div>

                    {{ __('home_page.service_title_1') }}
                </a>
            </li>
            <li>
                <a href="#service-web-design" class="nav-link" data-bs-toggle="tab" role="tab"
                    aria-selected="false">

                    <div class="alt-tabs-icon">
                        <span class="icon-desktop"></span>
                    </div>

                    {{ __('home_page.service_title_2') }}
                </a>
            </li>
            <li>
                <a href="#service-graphic" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">

                    <div class="alt-tabs-icon">
                        <span class="icon-tools"></span>
                    </div>

                    {{ __('home_page.service_title_3') }}
                </a>
            </li>
            <li>
                <a href="#service-development" class="nav-link" data-bs-toggle="tab" role="tab"
                    aria-selected="false">

                    <div class="alt-tabs-icon">
                        <span class="icon-gears"></span>
                    </div>

                    {{ __('home_page.service_title_4') }}
                </a>
            </li>
            <li>
                <a href="{{ route('shop') }}" class="">

                    <div class="alt-tabs-icon">
                        <span class="icon-camera"></span>
                    </div>

                    {{ __('home_page.service_title_5') }}
                </a>
            </li>
        </ul>
        <!-- End Nav tabs -->

        <!-- Tab panes -->
        <div class="tab-content tpl-tabs-cont">

            <!-- Service Item -->
            <div role="tabpanel" class="tab-pane fade show active" id="service-branding">
                <div class="section-text">
                    <div class="row">
                        <div class="col-md-4 mb-md-40 mb-xs-30">
                            <blockquote class="mb-0">
                                <p>
                                    {{ __('home_page.service_desc_01') }}
                                </p>
                            </blockquote>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                            {{ __('home_page.service_desc_02') }}
                        </div>
                        <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                            {{ __('home_page.service_desc_03') }}
                        </div>
                    </div>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="service-web-design">

                <div class="section-text">
                    <div class="row">
                        <div class="col-md-4 mb-md-40 mb-xs-30">
                            <blockquote class="mb-0">
                                <p>
                                    {{ __('home_page.service_desc_11') }}
                                </p>
                            </blockquote>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                            {{ __('home_page.service_desc_12') }}
                        </div>

                        <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                            {{ __('home_page.service_desc_13') }}
                        </div>


                    </div>
                </div>

            </div>

            <div role="tabpanel" class="tab-pane fade" id="service-graphic">

                <div class="section-text">
                    <div class="row">
                        <div class="col-md-4 mb-md-40 mb-xs-30">
                            <blockquote class="mb-0">
                                <p>
                                    {{ __('home_page.service_desc_21') }}
                                </p>
                            </blockquote>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                            {{ __('home_page.service_desc_22') }}
                        </div>
                        <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                            {{ __('home_page.service_desc_23') }}
                        </div>
                    </div>
                </div>

            </div>

            <div role="tabpanel" class="tab-pane fade" id="service-development">

                <div class="section-text">
                    <div class="row">
                        <div class="col-md-4 mb-md-40 mb-xs-30">
                            <blockquote class="mb-0">
                                <p>
                                    {{ __('home_page.service_desc_31') }}
                                </p>
                            </blockquote>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                            {{ __('home_page.service_desc_32') }}
                        </div>
                        <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                            {{ __('home_page.service_desc_33') }}
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- End Tab panes -->

        <div class="align-center">
            <a href="{{ route('services') }}"
                class="section-more font-alt">{{ __('home_page.VIEW ALL SERVICES') }}
                <i class="fa fa-angle-right"></i></a>
        </div>

    </div>
</section>
