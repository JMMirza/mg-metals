@extends('frontend.layouts.master')

@section('content')
    @include('frontend.products.header')
    @include('layouts.flash_message')

    <section class="page-section pt-5">
        <div class="container relative shop-page">
            <div class="row data">
                @include('frontend.products.sidebar')
                <div class="col">

                    <div class="clearfix mb-40">



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

                    </div>

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
