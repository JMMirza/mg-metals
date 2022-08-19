@extends('frontend.layouts.master')
@section('content')
    @include('frontend.shop_cart.header')
    @include('layouts.flash_message')
    <section class="page-section pt-5">
        <div class="container">
            <div class="row">
                <form id="customer_products_store" method="post" action="{{ route('customer-products.store') }}"
                    class="form">
                    @csrf
                    <div class="col-lg-10 offset-lg-1 col-xl-10 offset-xl-1">
                        <div class="table-responsive">
                            <table class="table table-striped shopping-cart-table">
                                <tr>
                                    <th> Photo </th>
                                    <th> Product </th>
                                    <th> Quantity </th>
                                    <th> Item Price </th>
                                    <th> Total </th>
                                    <th> &nbsp;</th>
                                    <th>
                                        <div class="Timer">

                                        </div>
                                    </th>
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
                                                <span class="d-none d-sm-inline-block"></span></a>
                                        </td>
                                        <td></td>
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
                            <div class="col-sm-12  align-right">
                                <div>
                                    <a href="{{ route('shop') }}" class="btn btn-mod btn-gray btn-round">Continue
                                        Shopping</a>
                                </div>

                            </div>
                        </div>

                        @if (count($carts) > 0)
                            <div class="row">
                                <div class="col-sm-6">
                                    {{-- <form action="#" class="form"> --}}
                                    <div class="mb-10">
                                        <label for="" class="font-alt">Delivery Method</label>
                                        <select class="input-md form-control" name="delivery_method_id" id="delivery_method"
                                            required>
                                            <option value="" selected disabled>Select One</option>
                                            @foreach ($delivery_methods as $delivery_method)
                                                <option value="{{ $delivery_method->id }}"
                                                    @if (old('delivery_method_id') == $delivery_method->id) {{ 'selected' }} @endif>
                                                    {{ $delivery_method->delivery_method }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="delivery_description"></div>
                                    <div class="mb-10">
                                        <label for="" class="font-alt">Payment Method</label>
                                        <select id="payment_method" name="payment_method_id" class="input-md form-control">
                                            <option value="" selected disabled>Select One</option>
                                            @foreach ($payment_methods as $payment_method)
                                                <option value="{{ $payment_method->id }}"
                                                    data-payment="{{ $payment_method->payment_method }}"
                                                    @if (old('payment_method_id') == $payment_method->id) {{ 'selected' }} @endif>
                                                    {{ $payment_method->payment_method }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="payment_description"></div>
                                    <div class="mb-10">
                                        <div class="form-group ht-70">
                                            <label class="radio-inline @if ($errors->has('gender')) is-invalid @endif">
                                                <input type="checkbox" name="termsAndConditions" value=""
                                                    id="termsAndConditions">
                                                I accept the Terms & Conditions & Payment Policy
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                {{-- </form> --}}
                                <div class="col-sm-6 pt-4 text-end">
                                    <div class="lead mt-0 mb-30">
                                        Order Total: <span id="total_price_usd"><strong>USD {{ $total_price }}
                                            </strong></span><span id="total_price_hkd" style="display: none"><strong>HKD
                                                {{ $total_price * $hkd_price }}
                                            </strong></span>
                                    </div>
                                    <div>
                                        <button type="submit" id="proceed_to_checkout"
                                            class="btn btn-mod btn-round btn-large" disabled>Proceed to
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
            var method;
            $.ajax({

                url: '/get-terms-and-condition/payment/' + payment_method,
                type: "GET",
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                cache: false,
                success: function(data) {
                    console.log(data.method.description);
                    method = data.method.payment_method.toLowerCase();
                    console.log(method)
                    $('#payment_description').empty();
                    $('#payment_description').append(data.method.description);
                    if (method.toLowerCase() == 'bank transfer') {
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

        $(document).on('change', '#delivery_method', function(e) {
            var delivery_method = $('#delivery_method').val();
            var method;
            $.ajax({

                url: '/get-terms-and-condition/delivery/' + delivery_method,
                type: "GET",
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                cache: false,
                success: function(data) {
                    console.log(data.method.description);
                    method = data.method.delivery_method;
                    $('#delivery_description').empty();
                    $('#delivery_description').append(data.method.description);
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

        $(document).ready(function() {
            $("#termsAndConditions").on('click', function(e) {
                if ($("#termsAndConditions").is(':checked')) {
                    // alert('checked')
                    $("#proceed_to_checkout").prop('disabled', false); // checked
                } else {
                    $("#proceed_to_checkout").prop('disabled', true); // unchecked}
                }
            })

            var countDownDate = new Date().getTime() + 15 * 60 * 1000;

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for hours, minutes and seconds
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                $('.Timer').text(minutes + ":" + seconds);

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    $('.Timer').text("EXPIRED");
                }
            }, 1000);
            // var start = new Date;

            // setInterval(function() {
            //     $('.Timer').text(new Date().getTime() + 15 * 60 * 1000 + " Seconds");
            // }, 1000);

            $('#customer_products_store').on('submit', function(e) {
                e.preventDefault();

                arrp = [];
                arrp.push($("input[name='cart_ids[]']").map(function() {
                    return $(this).val();
                }).get());

                let payment_method_id = $('#payment_method_id').val();
                let delivery_method_id = $('#delivery_method_id').val();
                let user_id = $('#user_id').val();

                let currency = 'USD';
                if (payment_method == 'bank_transfer') {
                    currency = 'HKD';
                }

                const url = $('#customer_products_store').attr('action');
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        cart_ids: arrp[0],
                        user_id: user_id,
                        delivery_method_id: delivery_method_id,
                        payment_method_id: payment_method_id,
                        currency: currency,
                    },
                    success: function(response) {
                        // alert('hello')
                        console.log(response);
                        if (response.url) {
                            if (payment_method == '1') {
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
