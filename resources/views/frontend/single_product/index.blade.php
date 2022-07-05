@extends('frontend.layouts.master')

@section('content')
    @include('frontend.single_product.header')
    @include('layouts.flash_message')
    <section class="page-section">
        <div class="container relative">

            <div class="row mb-60 mb-xs-30">

                <div class="col-md-4 mb-md-30">
                    <div class="post-prev-img">
                        <a href="{{ $product->product_picture_url }}" class="lightbox-gallery-3 mfp-image"><img
                                src="{{ $product->product_picture_url }}" alt="" /></a>
                        <div class="intro-label">
                            <span class="badge badge-danger bg-red">Sale</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-8 mb-xs-40">
                    @if (Config::get('app.locale') == 'en')
                        <h3 class="mt-0">{{ $product->name }}</h3>
                    @elseif (Config::get('app.locale') == 'ch')
                        <h3 class="mt-0">{{ $product->name_t_ch }}</h3>
                    @else
                        <h3 class="mt-0">{{ $product->name_s_ch }}</h3>
                    @endif


                    <hr class="mt-0 mb-30" />

                    <div class="row">
                        <div class="col-6 lead mt-0 mb-20">
                            <strong>{{ $product->getProductPrice() }}</strong>
                        </div>
                    </div>

                    <hr class="mt-0 mb-30" />

                    <div class="section-text mb-30">
                        @if (Config::get('app.locale') == 'en')
                            {{ $product->description }}
                        @elseif (Config::get('app.locale') == 'ch')
                            {{ $product->description_t_ch }}
                        @else
                            {{ $product->description_s_ch }}
                        @endif

                    </div>

                    <hr class="mt-0 mb-30" />

                    <div class="mb-30">
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="exampleModalCenterTitle">Purchasing Product</h2>
                                    </div>
                                    <form method="post" action="{{ route('customer-products.store') }}" class="form">
                                        @csrf
                                        <div class="modal-body">
                                            <input name="quantity" type="number" class="input-lg round" min="1"
                                                max="5" value="1" />
                                            <input type="text" value="{{ \Auth::user()->id }}" name="user_id" hidden>
                                            <input type="text" value="{{ $product->id }}" name="product_id" hidden>
                                            <input type="text"
                                                value="{{ $product->getProductPrice($type = 'number') }}"
                                                name="purchase_price" hidden>
                                            <input type="text" value="{{ \Auth::user()->referred_by }}"
                                                name="referral_code" hidden>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @if (\Auth::user())
                            <form method="post" action="{{ route('customer-products.store') }}" class="form">
                                @csrf
                                <input name="quantity" type="number" class="input-lg round" min="1" max="5"
                                    value="1" />
                                <input type="text" value="{{ \Auth::user()->id }}" name="user_id" hidden>
                                <input type="text" value="{{ $product->id }}" name="product_id" hidden>
                                <input type="text" value="{{ $product->getProductPrice($type = 'number') }}"
                                    name="purchase_price" hidden>
                                <input type="text" value="{{ \Auth::user()->referred_by }}" name="referral_code"
                                    hidden>
                                <button type="submit" class="btn btn-mod btn-large btn-round">Buy
                                    Now</button>
                            </form>
                            {{-- <button type="button" data-toggle="modal" data-target="#exampleModalCenter"
                                class="btn btn-mod btn-large btn-round">Buy
                                Now</button> --}}
                        @else
                            <a href="{{ route('customer_login') }}" class="btn btn-mod btn-large btn-round">Buy
                                Now</a>
                        @endif

                    </div>

                    <hr class="mt-0 mb-30" />

                    <div class="section-text small">
                        <div>SKU: {{ $product->sku }}</div>
                        <div>Category:
                            @if (Config::get('app.locale') == 'en')
                                <a href="{{ route('shop', ['category' => $product->category->id]) }}">
                                    {{ $product->category->name }}</a>
                            @elseif (Config::get('app.locale') == 'ch')
                                <a href="{{ route('shop', ['category' => $product->category->id]) }}">
                                    {{ $product->category->name_t_ch }}</a>
                            @else
                                <a href="{{ route('shop', ['category' => $product->category->id]) }}">
                                    {{ $product->category->name_s_ch }}</a>
                            @endif

                        </div>
                        <div>
                            Manufacturer:
                            @if (Config::get('app.locale') == 'en')
                                {{ $product->manufacturer->name }}
                            @elseif (Config::get('app.locale') == 'ch')
                                {{ $product->manufacturer->name_t_ch }}
                            @else
                                {{ $product->manufacturer->name_s_ch }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <ul role="tablist" class="nav nav-tabs tpl-tabs animate">
                <li>
                    <a href="#one" aria-controls="one" class="nav-link active" data-bs-toggle="tab" role="tab"
                        aria-selected="true">Description</a>
                </li>
            </ul>



            <div class="tab-content tpl-tabs-cont">
                <div role="tabpanel" class="tab-pane fade show active" id="one">
                    <p>
                        @if (Config::get('app.locale') == 'en')
                            {{ $product->description }}
                        @elseif (Config::get('app.locale') == 'ch')
                            {{ $product->description_t_ch }}
                        @else
                            {{ $product->description_s_ch }}
                        @endif
                    </p>
                </div>
            </div>
            <!-- End Tab panes -->
        </div>
    </section>
@endsection
