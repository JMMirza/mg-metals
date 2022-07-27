@extends('frontend.layouts.master')

@section('content')
    @include('frontend.orders.header')

    <section class="page-section" id="about">
        <div class="container relative">
            <div class="section-text mb-60 mb-sm-40">
                <h2>My Orders</h2>
                <table class="table table-bordered table-striped align-middle table-nowrap mb-0 mt-5" style="width:100%">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Quantity</th>
                            <th>Delivery Method</th>
                            <th>Total Price</th>
                            <th>Shipping Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->total_quantity }}</td>
                                <td>{{ $order->delivery_method }}</td>
                                @if ($order->total_order_price == null)
                                    <td>0 USD</td>
                                @else
                                    <td>{{ $order->total_order_price }} USD</td>
                                @endif
                                <td>{{ $order->shipping_address }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No Record Found!</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
