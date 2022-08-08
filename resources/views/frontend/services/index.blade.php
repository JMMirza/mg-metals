@extends('frontend.layouts.master')

@section('content')
    @include('frontend.services.header')

    <section class="page-section">
        <div class="container relative">
            <div class="row section-text mt-40 mb-30">
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

            <!-- <div class="align-center mb-40">
                <a href="{{ route('services') }}"
                    class="section-more font-alt playfare">{{ __('home_page.VIEW ALL SERVICES') }}
                    <i class="fa fa-angle-right"></i></a>
            </div> -->

            <div class="row mt-30 mb-30">
                <div class="col-md-12">
                    <ul role="tablist" class="nav nav-tabs tpl-alt-tabs font-alt pt-30 pt-sm-0 pb-30 pb-sm-0">
                        <li>
                            <a href="#service-branding" class="nav-link active" data-bs-toggle="tab" role="tab"
                                aria-selected="true">

                                <div class="alt-tabs-icon">
                                    
                                    <img src="{{ asset('frontend/images/icons/phy-gold.png') }}" alt="image" >
                                </div>

                               <div class="dark mb-3  mh-90"> {{ __('home_page.service_title_1') }}</div>
                               <p class="text-p font-alt">
                                    MG Metals accepts and trades high value physical gold. As long as you open a special account for gold bullion trading with us, you can deposit and trade physical gold at any time. MG Metals has a number of industry certifications, and all the gold bars it produces are approved by The Gold and Silver Exchange, Hong Kong. Investors can list their precious metals on The Gold and Silver Exchange during trading hours to sell and cash out at the market price, without worrying about extra fees paid to second-hand dealers.</p>
                            </a>
                        </li>
                        <li>
                            <a href="#service-web-design" class="nav-link" data-bs-toggle="tab" role="tab"
                                aria-selected="false">

                                <div class="alt-tabs-icon">
                                    
                                    <img src="{{ asset('frontend/images/icons/casting.png') }}" alt="image" >
                                </div>

                                <div class="dark mb-3  mh-90"> {{ __('home_page.service_title_2') }}</div>
                               <p class="text-p font-alt">
                                    We are one of few gold manufacturers with the accredited qualification. Our company has professional technical expertise and equipment to provide gold and silver recycling services for jewelry workshops, companies, recyclers, mining companies, and even retail customers. In 5 easy steps, you can instantly recycle gold and silver and cash out.want to share with your visitors.</p>
                            </a>
                        </li>
                        <li>
                            <a href="#service-graphic" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">

                                <div class="alt-tabs-icon">
                                    
                                    <img src="{{ asset('frontend/images/icons/ex-sol.png') }}" alt="image" >
                                </div>

                                <div class="dark mb-3  mh-90"> {{ __('home_page.service_title_4') }}</div>
                               <p class="text-p font-alt">MG Metals has been in the business of gold, stocks, futures, foreign exchange, capital, insurance, banking and loans for many years. With the group's knowledge and experience, the company is committed to provide financing solutions and foreign exchange solutions for various mining producers to help peers meet their funding needs and optimize their balance sheets.</p>
                            </a>
                        </li>
                        <li>
                            <a href="#service-development" class="nav-link" data-bs-toggle="tab" role="tab"
                                aria-selected="false">

                                <div class="alt-tabs-icon">
                                    <img src="{{ asset('frontend/images/icons/network.png') }}" alt="image" >
                                </div>

                                <div class="dark mb-3 mh-90" > {{ __('home_page.service_title_3') }}</div>
                               <p class="text-p font-alt">Gold investments are not limited to just high net-worth investors. The team at MG Group has integrated technologies and developed mobile applications allowing retail investors to invest in gold anytime, anywhere in the world. In order to make gold investing more popular, the investment threshold can be as low as tens of dollars, and door-to-door delivery can be arranged regardless of the investment amount. Ours is the first gold investment platform specially designed for the public.</p>
                            </a>
                        </li>
                    
                    </ul>
                </div>
            </div>
            
        </div>
    </section>
    <section class="page-section pt-0 pb-0 banner-section bg-dark "
                data-background="{{ asset('frontend/images/service-bg-2.png') }}">
                <div class="container relative">
                    
                        <div class="row interested-in ">
                            <div class="col-12 col-md-6 align-self-center p-0">
                                    <h2 class="font-alt text-center" style="transform: translate(-30px, 70px);;color: #DCA674;font-weight:bold;font-size:38px">MG Metals</h2>
                            </div>
                            <div class="col-12 col-md-6 align-self-center p-0">

                                <div class="">
                                    <div class="banner-content text-center">
                                        <h3 class="banner-heading font-alt bold playfare dark">
                                            {{ __('home_page.INTERESTED IN ANY OF OUR MEMBER SERVICES?') }}</h3>
                                        <div class="banner-decription dark text-left">Interested in any of our member services? Sign up or log in to our member services portal to continue with services offered by MG Metals. Contact us if you need more information.</div>
                                        <div class="local-scroll">
                                            <a href="{{ route('customer_login') }}"
                                                class="btn btn-mod btn-w btn-medium btn-round" style="background:#959595">{{ __('home_page.signup_login') }}</a>
                                            <a href="{{ route('contact_us') }}"
                                                class="btn btn-mod btn-w btn-medium btn-round"  style="background:#959595">{{ __('home_page.contact_us') }}</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    
                </div>
            </section>
@endsection
