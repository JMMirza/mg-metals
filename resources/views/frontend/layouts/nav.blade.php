<nav class="main-nav js-stick">
    <div class="full-wrapper relative clearfix">
        <!-- Logo ( * your text or image into link tag *) -->
        <div class="nav-logo-wrap local-scroll">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('frontend/images/mg-logo.webp') }}" alt="" />
            </a>
        </div>
        <div class="mobile-nav" role="button" tabindex="0">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Menu</span>
        </div>

        <!-- Main Menu -->
        <div class="inner-nav desktop-nav">
            <ul class="clearlist">

                <!-- Item With Sub -->
                <li>
                    <a href="{{ route('home') }}" role="button" class="">{{ __('home_page.home') }}</i></a>
                </li>
                <li>
                    <a href="{{ route('shop') }}" role="button"
                        class="">{{ __('home_page.RETAIL SHOP') }}</i></a>
                </li>
                <li>
                    <a href="{{ route('about_us') }}" class="">{{ __('home_page.about_us') }}</i></a>
                </li>
                <li>
                    <a href="{{ route('services') }}" class="">{{ __('home_page.our_service') }}</i></a>
                </li>
                <li>
                    <a href="{{ route('contact_us') }}" class="">{{ __('home_page.contact_us') }}</i></a>
                </li>

                @if (\Auth::user())
                    <li>
                        <a href="#" class="mn-has-sub">{{ \Auth::user()->name }}
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="mn-sub">
                            <li><a href="{{ route('customer_profile') . '?tab=individual' }}"
                                    class="text-center">{{ __('home_page.profile') }}</a></li>
                            <li>
                            <li><a href="{{ route('customer-orders') }}" class="text-center">My Orders</a></li>
                            <li><a href="{{ route('customer-commissions') }}" class="text-center">My Commission</a>
                            </li>
                            <li><a href="{{ route('customer-referrals') }}" class="text-center">My Referrals</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class=""
                                        onclick="event.preventDefault(); this.closest('form').submit();">{{ __('home_page.logout') }}</i></a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('customer_login') }}" class="">{{ __('home_page.login') }}</i></a>
                @endif
                </li>

                <!-- Divider -->
                {{-- <li><a>&nbsp;</a></li> --}}
                <!-- End Divider -->

                <!-- Languages -->
                <li>
                    <a href="#"
                        class="mn-has-sub">{{ (session()->get('locale') == 'ch' ? '繁體中文' : session()->get('locale') == 'ch_simple') ? '簡體中文' : 'English' }}
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="mn-sub">
                        <li><a href="{{ route('language', 'en') }}">English</a></li>
                        <li><a href="{{ route('language', 'ch') }}">繁體中文</a></li>
                        <li><a href="{{ route('language', 'ch_simple') }}">簡體中文</a></li>
                    </ul>
                </li>
                <!-- End Languages -->

            </ul>
        </div>
        <!-- End Main Menu -->


    </div>
</nav>
