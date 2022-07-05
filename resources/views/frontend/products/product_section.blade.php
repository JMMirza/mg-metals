<div class="col-md-4 col-lg-4 mb-60 mb-xs-40">

    <div class="post-prev-img">
        <a href="{{ route('single-product', $product->id) }}"><img src="{{ $product->product_picture_url }}"
                alt=""></a>
        {{-- <div class="intro-label">
            <span class="badge badge-danger bg-red">Sale</span>
        </div> --}}
    </div>

    @if (Config::get('app.locale') == 'en')
        {{-- {{ 'Current Language is English' }} --}}
        <div class="post-prev-title font-alt align-center">
            <a href="{{ route('single-product', $product->id) }}">{{ $product->name }}</a>
        </div>
    @elseif (Config::get('app.locale') == 'ch')
        {{-- {{ 'Current Language is Chinese Traditional' }} --}}
        <div class="post-prev-title font-alt align-center">
            <a href="{{ route('single-product', $product->id) }}">{{ $product->name_t_ch }}</a>
        </div>
    @else
        {{-- {{ 'Current Language is Chinese Simple' }} --}}
        <div class="post-prev-title font-alt align-center">
            <a href="{{ route('single-product', $product->id) }}">{{ $product->name_s_ch }}</a>
        </div>
    @endif
    <div class="post-prev-text align-center">
        <strong>{{ $product->getProductPrice() }}</strong>
    </div>

    <div class="post-prev-more align-center">
        <a href="{{ route('single-product', $product->id) }}" class="btn btn-mod btn-gray btn-round"><i
                class="fa fa-shopping-cart" aria-hidden="true"></i>{{ __('home_page.purchase') }}</a>
    </div>
</div>
