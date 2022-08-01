@extends('frontend.layouts.master')

@section('content')
    @include('frontend.shop_cart.header')
    @include('layouts.flash_message')
    <section class="page-section">
        <div class="container">
            <div class="row">
                {{-- <form method="post" action="{{ route('customer-products.store') }}" class="form">
                    @csrf --}}
                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                    <div class="table-responsive">
                        <table class="table table-striped shopping-cart-table">
                            <tr>
                                <th> Photo </th>
                                <th> Product </th>
                                <th> Q-ty </th>
                                <th> Item Price </th>
                                <th> Total </th>
                                <th> &nbsp;</th>
                            </tr>
                            @forelse ($carts as $cart)
                                <input type="text" id="loop_cart_ids" name="loop_cart_ids[]" value="{{ $cart->id }}"
                                    hidden>
                                <tr>
                                    <td> <img src="{{ $cart->product->product_picture_url }}" alt=""
                                            style="height: 100px;" /> </td>
                                    <td>
                                        <a href="{{ route('single-product', $cart->product->id) }}"
                                            title="">{{ $cart->product->name }}</a>
                                    </td>
                                    <td>
                                        {{ $cart->quantity }}
                                    </td>
                                    <td>
                                        ${{ $cart->spot_price }}
                                    </td>
                                    <td>
                                        ${{ $cart->total_price }}
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

                    {{-- <hr /> --}}

                    <div class="row">
                        <div class="col-sm-12 text align-right">
                            <div>
                                <a href="{{ route('shop') }}" class="btn btn-mod btn-gray btn-round">Update
                                    Cart</a>
                            </div>

                        </div>
                    </div>

                    @if (count($carts) > 0)
                        <hr class="mt-10 mb-60" />
                        <div class="row">
                            <div class="col-sm-6">

                                <h3 class="small-title font-alt">Delivery Method</h3>

                                <form action="#" class="form">

                                    <div class="mb-10">
                                        <select class="input-md form-control">
                                            <option>Select Method</option>
                                            <option>Hold</option>
                                            <option>Pick Up</option>
                                            <option>Delivery</option>
                                        </select>
                                    </div>
                                </form>

                            </div>
                            <div class="col-sm-6 text-end">
                                <div class="lead mt-0 mb-30">
                                    Order Total: <strong>{{ $total_price }} USD</strong>
                                </div>
                                <div>
                                    <button type="button" id="myModal" class="btn btn-mod btn-round btn-large"
                                        data-toggle="modal" data-target="#exampleModalCenter">Proceed to
                                        Checkout</button>
                                </div>


                            </div>
                        </div>
                    @endif
                </div>
                {{-- </form> --}}
            </div>

        </div>
    </section>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="panel-title">
                        Payment Details
                    </h3>
                </div>
                <form method="post" action="{{ route('customer-products.store') }}" class="form">
                    @csrf
                    <input type="text" id="cart_ids" name="cart_ids[]" value="" hidden>
                    <input type="text" value="{{ \Auth::user()->id }}" name="user_id" hidden>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">

                                        <div class="checkbox pull-right" style="margin: 0">
                                            <label>
                                                <input type="checkbox" />
                                                Remember
                                            </label>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="cardNumber">
                                                CARD NUMBER</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control mb-3" id="cardNumber"
                                                    placeholder="Valid Card Number" autofocus />
                                                <span class="input-group-addon"><span
                                                        class="glyphicon glyphicon-lock"></span></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-7 col-md-7">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="expityMonth">
                                                            EXPIRY DATE</label>
                                                        <div class="col-xs-6 col-md-6">
                                                            <input type="text" class="form-control" id="expityMonth"
                                                                placeholder="MM" />
                                                        </div>
                                                        <div class="col-xs-6 col-md-6">
                                                            <input type="text" class="form-control" id="expityYear"
                                                                placeholder="YY" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-5 col-md-5 pull-right">
                                                <div class="form-group">
                                                    <label for="cvCode">
                                                        CV CODE</label>
                                                    <input type="password" class="form-control" id="cvCode"
                                                        placeholder="CV" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <ul class="nav nav-pills nav-stacked">
                                    <li class="active"><a href="#"><span class="badge pull-right"><span
                                        class="glyphicon glyphicon-usd"></span>4200</span> Final Payment</a>
                                    </li>
                                </ul>
                                <br /> --}}
                                {{-- <a href="http://www.jquery2dotnet.com" class="btn btn-success btn-lg" role="button">Pay</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="modal_close" class="btn btn-mod btn-gray btn-round"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-mod btn-round">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

            $('#myModal').on('click', function(e) {
                e.preventDefault();
                arrp = [];
                arrp.push($("input[name='loop_cart_ids[]']").map(function() {
                    return $(this).val();
                }).get());
                $('#cart_ids').val(arrp);

                var cart_values = $("input[name='cart_ids[]']").map(function() {
                    return $(this).val();
                }).get();
                // alert(cart_values);
                $('#exampleModalCenter').modal('show')
            })

            $('#modal_close').on('click', function(e) {
                e.preventDefault()
                $('#exampleModalCenter').modal('hide')
            })
        });
    </script>
@endpush
