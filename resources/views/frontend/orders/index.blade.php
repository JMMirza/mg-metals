@extends('frontend.layouts.master')

@section('content')
    @include('frontend.orders.header')

    <section class="page-section pt-5" id="about">
        <div class="container relative">
            <div class="card mt-30 mb-30">
                <div class="card-header">
                    <h5 class="card-title flex-grow-1 mb-0">My Orders</h5>
                </div>
                <div class="card-body">
                <table class="table table-striped align-middle table-nowrap mb-0 mb-4" style="width:100%">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Quantity</th>
                            <th>Delivery Method</th>
                            <th>Total Price</th>
                            <th>Shipping Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ isset($order->delivery_method->delivery_method) ? $order->delivery_method->delivery_method : 'N / A' }}
                                </td>
                                @if ($order->total_price == null)
                                    <td>USD 0 </td>
                                @else
                                    <td>USD {{ $order->total_price }} </td>
                                @endif
                                <td>{{ $order->shipping_address }}</td>

                                <td><a href="{{ route('get-customer-order-details', $order->id) }}"
                                        class="btn btn-sm btn-icon waves-effect waves-light">
                                        Details
                                    </a></td>
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
        </div>
    </section>
@endsection
