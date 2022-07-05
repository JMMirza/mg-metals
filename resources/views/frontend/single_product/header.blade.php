<section class="small-section bg-dark-lighter" data-background="{{ asset('frontend/images/banner1.png') }}">
    <div class="relative container align-left">

        <div class="row">

            <div class="col-md-8">
                @if (Config::get('app.locale') == 'en')
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">{{ $product->name }}</h1>
                @elseif (Config::get('app.locale') == 'ch')
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">{{ $product->name_t_ch }}</h1>
                @else
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">{{ $product->name_s_ch }}</h1>
                @endif

                {{-- <div class="hs-line-4 font-alt">
                    Lorem ipsum dolor sit amet, consectetur adipiscing
                </div> --}}
            </div>

            <div class="col-md-4 mt-30">
                <div class="mod-breadcrumbs font-alt align-right">
                    <a href="{{ route('home') }}">{{ __('home_page.home') }}</a>&nbsp;/&nbsp;<a
                        href="{{ route('shop') }}">{{ __('home_page.products') }}</a>/&nbsp;
                    @if (Config::get('app.locale') == 'en')
                        <span>{{ $product->name }}</span>
                    @elseif (Config::get('app.locale') == 'ch')
                        <span>{{ $product->name_t_ch }}</span>
                    @else
                        <span>{{ $product->name_s_ch }}</span>
                    @endif

                </div>
            </div>
        </div>

    </div>
</section>
