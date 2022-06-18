<nav class="main-nav js-stick">
    <div class="full-wrapper relative clearfix">
        <!-- Logo ( * your text or image into link tag *) -->
        <div class="nav-logo-wrap local-scroll">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('frontend/images/mgmetals_logo.png') }}" alt="" />
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
                    <a href="{{ route('home') }}" role="button" class="">{{ __('home_page.home'); }}</i></a>
                </li>
                <li>
                    <a href="{{ route('about_us') }}" class="">About Us</i></a>
                </li>
                <li>
                    <a href="{{ route('services') }}" class="">Our Services</i></a>
                </li>
                <li>
                    <a href="{{ route('contact_us') }}" class="">Contact Us</i></a>
                </li>
                <li>
                    <a href="{{ route('customer_login') }}" class="">Login</i></a>
                </li>

                <!-- Divider -->
                <li><a>&nbsp;</a></li>
                <!-- End Divider -->

                <!-- Languages -->
                <li>
                    <a href="#" class="mn-has-sub">Eng <i class="fa fa-angle-down"></i></a>

                    <ul class="mn-sub">
                        <li><a href="{{ route('language', 'en') }}">English</a></li>
                        <li><a href="{{ route('language', 'ch') }}">Chinies</a></li>
                    </ul>

                </li>
                <!-- End Languages -->

            </ul>
        </div>
        <!-- End Main Menu -->


    </div>
</nav>
