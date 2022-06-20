@extends('frontend.layouts.master')

@section('content')
    @include('frontend.single_product.header')
    <section class="page-section">
        <div class="container relative">
            <!-- Product Content -->
            <div class="row mb-60 mb-xs-30">
                <!-- Product Images -->
                <div class="col-md-4 mb-md-30">
                    <div class="post-prev-img">
                        <a href="{{ $product->product_picture_url }}" class="lightbox-gallery-3 mfp-image"><img
                                src="{{ $product->product_picture_url }}" alt="" /></a>
                        <div class="intro-label">
                            <span class="badge badge-danger bg-red">Sale</span>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-3 post-prev-img">
                            <a href="{{ asset('frontend/images/shop/shop-prev-2.jpg') }}"
                                class="lightbox-gallery-3 mfp-image"><img
                                    src="{{ asset('frontend/images/shop/shop-prev-2.jpg') }}" alt="" /></a>
                        </div>

                        <div class="col-3 post-prev-img">
                            <a href="{{ asset('frontend/images/shop/shop-prev-3.jpg') }}"
                                class="lightbox-gallery-3 mfp-image"><img
                                    src="{{ asset('frontend/images/shop/shop-prev-3.jpg') }}" alt="" /></a>
                        </div>

                        <div class="col-3 post-prev-img">
                            <a href="{{ asset('frontend/images/shop/shop-prev-4.jpg') }}"
                                class="lightbox-gallery-3 mfp-image"><img
                                    src="{{ asset('frontend/images/shop/shop-prev-4.jpg') }}" alt="" /></a>
                        </div>
                    </div> --}}
                </div>
                <!-- End Product Images -->

                <!-- Product Description -->
                <div class="col-sm-12 col-md-8 mb-xs-40">
                    <h3 class="mt-0">{{ $product->name }}</h3>

                    <hr class="mt-0 mb-30" />

                    <div class="row">
                        <div class="col-6 lead mt-0 mb-20">
                            {{-- <del class="section-text">$50.00</del> --}}
                            <strong>{{ $product->getProductPrice() }}</strong>
                        </div>

                    </div>

                    <hr class="mt-0 mb-30" />

                    <div class="section-text mb-30">
                        {{ $product->description }}
                    </div>

                    <hr class="mt-0 mb-30" />

                    <div class="mb-30">
                        <form method="post" action="#" class="form">
                            <input type="number" class="input-lg round" min="1" max="100" value="1" />
                            <a href="#" class="btn btn-mod btn-large btn-round">Buy Now</a>

                            {{-- <input type="text" class="input-lg round" placeholder="Agent Code"> --}}

                        </form>
                    </div>

                    <hr class="mt-0 mb-30" />

                    <div class="section-text small">
                        <div>SKU: {{ $product->sku }}</div>
                        <div>Category: <a href="{{ route('shop', ['category' => $product->category->id]) }}">
                                {{ $product->category->name }}</a></div>
                        <div>
                            Manufacturer:
                            {{-- <a href="#"> --}}
                            {{ $product->manufacturer->name }}
                            {{-- </a> --}}
                        </div>
                    </div>
                </div>
                <!-- End Product Description -->

                <!-- Features -->
                {{-- <div class="col-sm-4 col-md-3 mb-xs-40">
                    <!-- Features Item -->
                    <div class="alt-service-wrap">
                        <div class="alt-service-item">
                            <div class="alt-service-icon">
                                <i class="fa fa-paper-plane-o"></i>
                            </div>
                            <h3 class="alt-services-title font-alt">Free Shipping</h3>
                            Vivamus neque orci, ultricies blandit ultricies vel,
                            semper..
                        </div>
                    </div>
                    <!-- End Features Item -->

                    <!-- Features Item -->
                    <div class="alt-service-wrap">
                        <div class="alt-service-item">
                            <div class="alt-service-icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <h3 class="alt-services-title font-alt">
                                14 days moneyback
                            </h3>
                            Vivamus neque orci, ultricies blandit ultricies vel,
                            semper..
                        </div>
                    </div>
                    <!-- End Features Item -->

                    <!-- Features Item -->
                    <div class="alt-service-wrap">
                        <div class="alt-service-item">
                            <div class="alt-service-icon">
                                <i class="fa fa-gift"></i>
                            </div>
                            <h3 class="alt-services-title font-alt">100% Original</h3>
                            Vivamus neque orci, ultricies blandit ultricies vel,
                            semper..
                        </div>
                    </div>

                </div> --}}

            </div>


            <!-- Nav tabs -->
            <ul role="tablist" class="nav nav-tabs tpl-tabs animate">
                <li>
                    <a href="#one" aria-controls="one" class="nav-link active" data-bs-toggle="tab" role="tab"
                        aria-selected="true">Description</a>
                </li>
                {{-- <li>
                    <a href="#two" aria-controls="two" class="nav-link" data-bs-toggle="tab" role="tab"
                        aria-selected="false">Parameters</a>
                </li> --}}
                {{-- <li>
                    <a href="#three" aria-controls="three" class="nav-link" data-bs-toggle="tab" role="tab"
                        aria-selected="false">Reviews (3)</a>
                </li> --}}
            </ul>



            <div class="tab-content tpl-tabs-cont">
                <div role="tabpanel" class="tab-pane fade show active" id="one">
                    <p>
                        {{ $product->description }}
                    </p>
                </div>
                {{-- <div role="tabpanel" class="tab-pane fade" id="two">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Parameter</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td>Size</td>
                            <td>Small, Medium & Large</td>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <td>Black & White</td>
                        </tr>
                        <tr>
                            <td>Waist</td>
                            <td>25cm</td>
                        </tr>
                        <tr>
                            <td>Length</td>
                            <td>50cm</td>
                        </tr>
                    </table>
                </div> --}}
                <div role="tabpanel" class="tab-pane fade" id="three">
                    <div class="mb-60 mb-xs-30">
                        <ul class="media-list text comment-list clearlist">
                            <!-- Comment Item -->
                            <li class="media comment-item">
                                <a class="pull-left" href="#"><img class="media-object comment-avatar"
                                        src="images/user-avatar.png" alt="" /></a>
                                <div class="media-body">
                                    <div class="comment-item-data">
                                        <div class="comment-author">
                                            <a href="#">Emma Johnson</a>
                                        </div>
                                        Feb 9, 2014, at 10:37<span class="separator">&mdash;</span>

                                        <span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span>
                                    </div>
                                    <p>
                                        Donec fermentum turpis et finibus commodo. Sed dictum
                                        laoreet mi, vitae dignissim purus interdum at. Sed a
                                        est at purus cursus elementum ut sed lectus. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit.
                                        Quisque at magna ut ante eleifend eleifend.
                                    </p>
                                </div>
                            </li>
                            <!-- End Comment Item -->

                            <!-- Comment Item -->
                            <li class="media comment-item">
                                <a class="pull-left" href="#"><img class="media-object comment-avatar"
                                        src="images/user-avatar.png" alt="" /></a>
                                <div class="media-body">
                                    <div class="comment-item-data">
                                        <div class="comment-author">
                                            <a href="#">John Doe</a>
                                        </div>
                                        Feb 9, 2014, at 10:3<span class="separator">&mdash;</span>
                                        <span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit. Quisque at magna ut ante eleifend eleifend.
                                    </p>
                                </div>
                            </li>
                            <!-- End Comment Item -->
                        </ul>
                    </div>

                    <!-- Add Review -->
                    <div>
                        <h4 class="blog-page-title font-alt">Add Review</h4>

                        <!-- Form -->
                        <form method="post" action="#" id="form" class="form">
                            <div class="row mb-20 mb-md-10">
                                <div class="col-md-6 mb-md-10">
                                    <!-- Name -->
                                    <input type="text" name="name" id="name" class="input-md form-control"
                                        placeholder="Name *" maxlength="100" required aria-required="true" />
                                </div>

                                <div class="col-md-6">
                                    <!-- Email -->
                                    <input type="email" name="email" id="email" class="input-md form-control"
                                        placeholder="Email *" maxlength="100" required aria-required="true" />
                                </div>
                            </div>

                            <div class="mb-20 mb-md-10">
                                <!-- Rating -->
                                <select class="input-md form-control">
                                    <option>-- Select one --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <!-- Comment -->
                            <div class="mb-30 mb-md-10">
                                <textarea name="text" id="text" class="input-md form-control" rows="6" placeholder="Comment"
                                    maxlength="400"></textarea>
                            </div>

                            <!-- Send Button -->
                            <button type="submit" class="btn btn-mod btn-medium btn-round">
                                Send Review
                            </button>
                        </form>
                        <!-- End Form -->
                    </div>
                    <!-- End Add Review -->
                </div>
            </div>
            <!-- End Tab panes -->
        </div>
    </section>
@endsection
