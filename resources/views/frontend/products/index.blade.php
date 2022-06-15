@extends('frontend.layouts.master')
   
@section('content')

   @include('frontend.products.header')

    <section class="page-section">
        <div class="container relative">
            <div class="row">
                
                <div class="col-sm-8">
                    
                    <div class="clearfix mb-40">
                        
                        <div class="left section-text mt-10">
                            Showing 1–{{ $products->count() }} of {{ $products->total() }} results
                        </div>
                        
                        <div class="right">
                            <form method="post" action="#" class="form">
                                <select class="input-md round">
                                    <option>Default sorting</option>
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

                @include('frontend.products.sidebar')

            </div>
        </div>
    </section>
    
@endsection
