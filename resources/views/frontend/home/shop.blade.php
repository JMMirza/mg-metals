<section class="page-section">
    <div class="container relative">
        
        <h2 class="section-title font-alt align-left mb-70 mb-sm-40">
            Bestsellers
            
            <a href="{{ route('shop') }}" class="section-more right">Retail Shop <i class="fa fa-angle-right"></i></a>
            
        </h2>
        
        <div class="row multi-columns-row">
        
            @forelse ($products as $product)
                @include('frontend.products.product_section')
            @empty
                <div class="alert alert-dark" role="alert"> No products Found</div>
            @endforelse
        
        </div>
        
    </div>
</section>