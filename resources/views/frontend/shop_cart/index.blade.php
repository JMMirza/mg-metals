@extends('frontend.layouts.master')

@section('content')
    @include('frontend.shop_cart.header')
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                    <div class="table-responsive">
                        <table class="table table-striped shopping-cart-table">
                            <tr>
                                <th>
                                    Photo
                                </th>
                                <th>
                                    Product
                                </th>
                                <th>
                                    Q-ty
                                </th>
                                <th>
                                    Total
                                </th>
                                <th>
                                </th>
                            </tr>
                            @forelse ($carts as $cart)
                                <tr>
                                    <td>
                                        <img src="{{ $cart->product->product_picture_url }}" alt=""
                                            style="height: 100px;" />
                                    </td>
                                    <td>
                                        <a href="#" title="">{{ $cart->product->name }}</a>
                                    </td>
                                    <td>
                                        <form class="form">
                                            <input type="number" class="input-sm" style="width: 60px;" min="1"
                                                max="100" value="1" />
                                        </form>
                                    </td>
                                    <td>
                                        ${{ $cart->spot_price }}
                                    </td>
                                    <td>
                                        <a class="delete-cart" href="{{ route('shop-cart.destroy', $cart->id) }}"><i
                                                class="fa fa-times"></i>
                                            <span class="d-none d-sm-inline-block">Remove</span></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No Record Found!</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-sm-12 text align-right">
                            <div>
                                <a href="{{ route('shop') }}" class="btn btn-mod btn-gray btn-round">Update
                                    Cart</a>
                            </div>

                        </div>
                    </div>

                    <hr class="mt-10 mb-60" />

                    <div class="row">
                        <div class="col-sm-12 text align-right pt-10">
                            <div>
                                Cart subtotal: <strong>$45.95</strong>
                            </div>

                            <div class="mb-10">
                                Shipping: <strong>$30.00</strong>
                            </div>

                            <div class="lead mt-0 mb-30">
                                Order Total: <strong>$75.99</strong>
                            </div>

                            <div>
                                <a href="#" class="btn btn-mod btn-round btn-large">Proceed to Checkout</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@push('frontend.layouts.footer_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.delete-cart', function(e) {
                e.preventDefault();

                var url = $(this).attr('href');

                $.ajax({

                    url: url,
                    type: "DELETE",
                    // data : filters,
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(data) {
                        // alert('deleted')
                        location.reload(true);
                    },
                    error: function(error) {
                        // alert(error)
                    },
                    beforeSend: function() {

                    },
                    complete: function() {

                    }
                });
            });
        });
    </script>
@endpush
