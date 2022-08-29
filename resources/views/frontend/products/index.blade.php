@extends('frontend.layouts.master')

@section('content')
    @include('frontend.products.header')
    @include('layouts.flash_message')

    <section class="page-section pt-5">
        <div class="container relative shop-page">
            <div class="row">
                @include('frontend.products.sidebar')
                <div class="col">

                    <div class="clearfix mb-40">

                        <!-- <div class="left section-text mt-10">
                            Showing 1–{{ $products->count() }} of {{ $products->total() }} results
                        </div> -->

                        <div class="right">
                            <form method="post" action="#" class="form">
                                <select class="input-md round">
                                    <option>Sorting</option>
                                    <option>Sort by price: low to high</option>
                                    <option>Sort by price: high to low</option>
                                </select>
                            </form>
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
                    {{ $products->links() }}
                    <!-- End Pagination -->

                </div>
            </div>
        </div>
    </section>
@endsection
