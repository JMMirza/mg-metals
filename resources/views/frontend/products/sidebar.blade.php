<div class="col-sm-4 col-md-3 offset-md-1 sidebar">


    <!-- Widget -->
    <div class="widget">

        <h5 class="widget-title font-alt">Categories</h5>

        <div class="widget-body">
            <ul class="clearlist widget-menu">

                <li>
                    <a href="{{ route('shop') }}" title="">All Products</a>
                    <small>
                        - 7
                    </small>
                </li>

                @forelse ($categories as $category)
                    <li>
                        <a href="{{ route('shop', ['category' => $category->id]) }}"
                            title="">{{ $category->name }}</a>
                        <small>
                            - 7
                        </small>
                    </li>
                @empty
                    <div class="alert alert-dark" role="alert"> No Category Found!</div>
                @endforelse



            </ul>
        </div>

    </div>
    <!-- End Widget -->

    <!-- Widget -->
    <div class="widget">

        <h5 class="widget-title font-alt">Bestsellers</h5>

        <div class="widget-body">
            <ul class="clearlist widget-posts">

                <!-- Preview item -->
                @forelse ($products as $product)
                    <li class="clearfix">
                        <a href="#"><img src="images/shop/previews/shop-prev-1.jpg" alt="" class="widget-posts-img"></a>
                        <div class="widget-posts-descr">
                            <a href="#" title="">{{ $product->name }}</a>
                            <div>
                                <del>
                                    50.00
                                </del>&nbsp;
                                $25.99
                            </div>
                            <div>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </li>
                @empty
                    <div class="alert alert-dark" role="alert"> No Category Found!</div>
                @endforelse

            </ul>
        </div>
    </div>
    <div class="widget">
        <h5 class="widget-title font-alt">Tags</h5>
        <div class="widget-body">
            <div class="tags">
                <a href="#">Design</a>
                <a href="#">Portfolio</a>
                <a href="#">Digital</a>
                <a href="#">Branding</a>
                <a href="#">Theme</a>
                <a href="#">Clean</a>
                <a href="#">UI &amp; UX</a>
                <a href="#">Love</a>
            </div>
        </div>
    </div>
</div>