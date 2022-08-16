<div class="col-sm-12 col-md-3 col-lg-3 mb-60 mb-xs-40">

    <div class="post-prev-img boxed">
        <a href="{{ route('single-product', $product->id) }}"><img src="{{ $product->product_picture_url }}"
                alt=""></a>
        {{-- @if ($product->productsInventory($product->id) != null) --}}
        @if ($product->productsQuantity() != null)
            <div class="intro-label">
                <span class="badge badge-primary bg-green">In Stock</span>
            </div>
        @else
            <div class="intro-label">
                <span class="badge badge-danger bg-red">Not Available</span>
            </div>
        @endif
        {{-- @endif --}}
        {{-- <div class="intro-label">
            <span class="badge badge-danger bg-red">Sale</span>
        </div> --}}
        <a href="{{ route('single-product', $product->id) }}" class="quick-view"> Quick View</a>
        
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

    @if (\Auth::user())
        <div class="post-prev-text align-center">
            <strong>{{ $product->getProductPrice() }}</strong>
        </div>
    @endif

    
</div>
