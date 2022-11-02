@extends('frontend.layouts.master')

@section('content')
    @include('frontend.products.header')
    @include('layouts.flash_message')

    <section class="page-section pt-5">
        
        <div class="container relative shop-page">
            <div class="section-text shop-heading">
                <h1 class="hs-line-11 font-alt mb-0 mb-xs-0 playfare dark"> Our Retail Shop</h1>
                <p>We carft every product with passion and dedication tounleashing the intrinsic artistic value of the precious metal. whatever your collection intentions, as you explore our wide range of products, you will find that you are not only buying a commodity with monetary valye, but also a piece of art with collectible worth.</p>
            </div>
            <div class="filters">
                <select><option>Filter By</option></select>
                <select><option>Sort By</option></select>
            </div>
            <div class="row data">
                @include('frontend.products.sidebar')
                <div class="col">

                    <!-- <div class="clearfix mb-40">



                        <div class="right">
                            @if (Request::get('sort') == 'asc')
                                <a href="{{ route('shop', ['sort' => 'desc']) }}">Sort By Price <span><i
                                            class="fa fa-solid fa-sort"></i></span></a>
                            @else
                                <a href="{{ route('shop', ['sort' => 'asc']) }}">Sort By Price <span><i
                                            class="fa fa-solid fa-sort"></i></span></a>
                            @endif
                            {{-- <form method="post" action="#" class="form">
                                <select class="input-md round">
                                    <option>{{ __('home_page.sorting') }}</option>
                                    <option>{{ __('home_page.sorting_low_high') }}</option>
                                    <option>{{ __('home_page.sorting_high_low') }}</option>
                                </select>
                            </form> --}}
                        </div>

                    </div> -->

                    <div class="row multi-columns-row">

                        @forelse ($products as $product)
                            @include('frontend.products.product_section')
                        @empty
                            <div class="alert alert-dark" role="alert"> No products Found</div>
                        @endforelse

                    </div>

                    <!-- Pagination -->
                    {{-- {{ $products->links() }} --}}
                    <!-- End Pagination -->

                </div>
            </div>
        </div>
    </section>
@endsection
