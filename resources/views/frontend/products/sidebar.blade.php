<div class="col-sm-4 col-md-3 offset-md-1 sidebar">


    <!-- Widget -->
    <div class="widget">

        <h5 class="widget-title font-alt">Categories</h5>

        <div class="widget-body">
            <ul class="clearlist widget-menu">

                <li>
                    <a href="{{ route('shop') }}" title="">All Products</a>
                    {{-- <small>
                        - 7
                    </small> --}}
                </li>

                @forelse ($categories as $category)
                    <li>
                        <strong>
                            <a href="{{ route('shop', ['category' => $category->id]) }}"
                                title="">{{ $category->name }}</a>
                            {{-- <small>
                                - 7
                            </small> --}}
                        </strong>

                        @if($category->children->count() > 0)
                            @foreach ($category->children as $childCategory)
                                <li>
                                    --- <a href="{{ route('shop', ['category' => $childCategory->id]) }}"
                                        title="">{{ $childCategory->name }}</a>
                                    {{-- <small>
                                        - 7
                                    </small> --}}
                                </li>
                            @endforeach
                        @endif

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
                @forelse ($best_sellers as $product)
                    <li class="clearfix">
                        <a href="{{ route('single-product', $product->id) }}"><img src="images/shop/previews/shop-prev-1.jpg" alt="" class="widget-posts-img"></a>
                        <div class="widget-posts-descr">
                            <a href="{{ route('single-product', $product->id) }}" title="">{{ $product->name }}</a>
                            <div>
                                {{ $product->getProductPrice() }}
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
        <h5 class="widget-title font-alt">Manufacturer</h5>
        <div class="widget-body">
            <div class="tags">
                @forelse ($manufacturers as $manufacturer)
                    <a href="#">{{ $manufacturer->name }}</a>
                @empty
                    <div class="alert alert-dark" role="alert"> No manufacturer Found!</div>
                @endforelse
                
            </div>
        </div>
    </div>
</div>
