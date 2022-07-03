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
                            <th>Product Name</th>
                            <th>Delivery Method</th>
                            <th>Spot Price</th>
                            <th>Mark Up</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->product->name }}</td>
                                <td>{{ $order->delivery_method }}</td>
                                <td>{{ $order->spot_price }} USD</td>
                                @if ($order->product->markup_type == 'flat')
                                    <td>{{ $order->mark_up }} USD</td>
                                @else
                                    <td>{{ $order->mark_up }} %</td>
                                @endif
                                <td>{{ $order->quantity }}</td>
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
