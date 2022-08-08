@extends('frontend.layouts.master')

@section('content')
    @include('frontend.shop_cart.header')
    @include('layouts.flash_message')
    <section class="page-section">
        <div class="container">
            <div class="row">
                <form id="customer_products_store" method="post" action="{{ route('customer-products.store') }}"
                    class="form">
                    @csrf
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
                                    <input type="text" id="cart_ids" name="cart_ids[]" value="{{ $cart->id }}"
                                        hidden>
                                    <input type="text" id="user_id" value="{{ \Auth::user()->id }}" name="user_id"
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
                                            <span class="spot_price_usd"> ${{ $cart->spot_price }} </span> <span
                                                class="spot_price_hkd" style="display: none">
                                                HK$ {{ $cart->spot_price * $hkd_price }}</span>
                                        </td>
                                        <td>
                                            <span class="price_usd"> ${{ $cart->total_price }} </span> <span
                                                class="price_hkd" style="display: none">
                                                HK$ {{ $cart->total_price * $hkd_price }}</span>

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

                        <div class="row mt-10 mb-60">
                            <div class="col-sm-12 text align-right">
                                <div>
                                    <a href="{{ route('shop') }}" class="btn btn-mod btn-gray btn-round">Update
                                        Cart</a>
                                </div>

                            </div>
                        </div>

                        @if (count($carts) > 0)
                            <div class="row">
                                <div class="col-sm-6">

                                    {{-- <form action="#" class="form"> --}}
                                    <div class="mb-10">
                                        <label for="" class="font-alt">Delivery Method</label>
                                        <select
                                            class="form-select form-control @if ($errors->has('delivery_method')) is-invalid @endif"
                                            name="delivery_method" id="delivery_method" required>
                                            <option value="" selected disabled>
                                                Delivery Method
                                            </option>
                                            <option value="courier">
                                                Courier
                                            </option>
                                            <option value="hold">
                                                Keep With MG
                                            </option>
                                        </select>
                                    </div>

                                    <div id="courier_div" class="mb-10" style="display: none">
                                        <div class="form-group ht-70">
                                            <label class="radio-inline @if ($errors->has('gender')) is-invalid @endif">
                                                <input type="radio" name="courier_type" value="company_courier"
                                                    id="company_courier">
                                                Quote me Courier Charges
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="courier_type" value="self_courier"
                                                    id="self_courier">
                                                I will arrange Courier
                                            </label>
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-10">
                                        <label for="" class="font-alt">Payment Method</label>
                                        <select id="payment_method" name="payment_method" class="input-md form-control">
                                            <option value="">Select Method</option>
                                            <option value="bank_transfer">Bank Transfer</option>
                                            <option value="credit_card">Credit Card</option>
                                        </select>
                                    </div>

                                </div>
                                {{-- </form> --}}
                                <div class="col-sm-6 pt-4 text-end">
                                    <div class="lead mt-0 mb-30">
                                        Order Total: <span id="total_price_usd"><strong>{{ $total_price }}
                                                USD</strong></span><span id="total_price_hkd"
                                            style="display: none"><strong>{{ $total_price * $hkd_price }}
                                                HKD</strong></span>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-mod btn-round btn-large">Proceed to
                                            Checkout</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </form>
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
                {{-- <form method="post" id="customer_products_store" action="{{ route('customer-products.store') }}"
                    class="form">
                    @csrf --}}
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
                        </div>
                    </div>
                </div>
                <input type="hidden" value="" id="url">
                <div class="modal-footer">
                    <button type="button" id="modal_close" class="btn btn-mod btn-gray btn-round"
                        data-dismiss="modal">Close</button>
                    <button type="button" id="modal_submit_btn" class="btn btn-mod btn-round">Save changes</button>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
@endsection
@push('frontend.layouts.footer_scripts')
    <script type="text/javascript">
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

        $(document).on('change', '#payment_method', function(e) {
            var payment_method = $('#payment_method').val();
            if (payment_method == 'bank_transfer') {
                document.getElementById('total_price_usd').style.display = "none";
                document.getElementById('total_price_hkd').style.display = "block";
                $('.spot_price_usd').css("display", "none");
                $('.spot_price_hkd').css("display", "block");
                $('.price_usd').css("display", "none");
                $('.price_hkd').css("display", "block");
            } else {
                document.getElementById('total_price_usd').style.display = "block";
                document.getElementById('total_price_hkd').style.display = "none";
                $('.spot_price_usd').css("display", "block");
                $('.spot_price_hkd').css("display", "none");
                $('.price_usd').css("display", "block");
                $('.price_hkd').css("display", "none");
            }
        });

        $(document).ready(function() {
            $('#delivery_method').on('change', function(e) {
                const delivery_method = $('#delivery_method').val();
                if (delivery_method == 'courier') {
                    document.getElementById('courier_div').style.display = 'block';
                } else {
                    document.getElementById('courier_div').style.display = 'none';
                }
            });

            $('#customer_products_store').on('submit', function(e) {
                e.preventDefault();

                arrp = [];
                arrp.push($("input[name='cart_ids[]']").map(function() {
                    return $(this).val();
                }).get());

                let payment_method = $('#payment_method').val();
                let delivery_method = $('#delivery_method').val();
                let user_id = $('#user_id').val();

                let currency = 'USD';
                if (payment_method == 'bank_transfer') {
                    currency = 'HKD';
                }

                let courier_type = '';

                if ($('#company_courier').is(':checked')) {
                    courier_type = $('#company_courier').val();
                }

                if ($('#self_courier').is(':checked')) {
                    courier_type = $('#self_courier').val();
                }
                const url = $('#customer_products_store').attr('action');
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        cart_ids: arrp[0],
                        user_id: user_id,
                        delivery_method: delivery_method,
                        payment_method: payment_method,
                        currency: currency,
                        courier_type: courier_type,
                    },
                    success: function(response) {
                        // alert('hello')
                        console.log(response);
                        if (response.url) {
                            if (payment_method == 'bank_transfer') {
                                window.location = response.url;
                            } else {
                                $('#exampleModalCenter').modal('show');
                                $('#url').val(response.url);
                            }
                        }
                        if (response.error) {
                            document.getElementById('err_div').style.display = "block";
                            document.getElementById('success_div').style.display = "none";
                            $('#err_span').text(response.error);
                            $("#shor_cart_form")[0].reset();
                        }
                    },
                    error: function(error) {
                        console.log(error)
                        // $('#err_div').text(response.success);
                    }
                });
            });

            $('#modal_submit_btn').on('click', function(e) {
                window.location = $('#url').val();
            })

            $('#modal_close').on('click', function(e) {
                e.preventDefault()
                $('#exampleModalCenter').modal('hide')
            })
        });
    </script>
@endpush
