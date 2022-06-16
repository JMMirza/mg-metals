<div class="col-md-4 col-lg-4 mb-60 mb-xs-40">

    <div class="post-prev-img">
        <a href="shop-single.html"><img src="{{ $product->product_picture_url }}" alt=""></a>
        {{-- <div class="intro-label">
            <span class="badge badge-danger bg-red">Sale</span>
        </div> --}}
    </div>

    <div class="post-prev-title font-alt align-center">
        <a href="shop-single.html">{{ $product->name }}</a>
    </div>

    <div class="post-prev-text align-center">
        <strong>{{ $product->getProductPrice(); }}</strong>
    </div>

    <div class="post-prev-more align-center">
        <a href="#" class="btn btn-mod btn-gray btn-round"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Purchase</a>
    </div>

</div>
