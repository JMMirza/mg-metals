<section class="small-section bg-dark-lighter" data-background="{{ asset('frontend/images/banner1.png') }}">
    <div class="relative container align-left">

        <div class="row">

            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">{{ $product->name }}</h1>
                <div class="hs-line-4 font-alt">
                    Lorem ipsum dolor sit amet, consectetur adipiscing
                </div>
            </div>

            <div class="col-md-4 mt-30">
                <div class="mod-breadcrumbs font-alt align-right">
                    <a href="{{ route('home') }}">Home</a>&nbsp;/&nbsp;<a href="{{ route('shop') }}">Products</a>/&nbsp;<span>{{ $product->name }}</span>
                </div>
            </div>
        </div>

    </div>
</section>
