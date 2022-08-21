@extends('frontend.layouts.master')

@section('content')
    @include('frontend.orders.header')

    <section class="page-section">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Order #{{ $order->id }}</h5>
                        <div class="flex-shrink-0">
                            <span class="badge bg-info p-2" style="font-size: 15px">Order Status:
                                {{ $order->order_status }}</span>
                            {{-- <a href="apps-invoices-details.html" class="btn btn-success btn-sm"><i
                                    class="ri-download-2-fill align-middle me-1"></i> Invoice</a> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-nowrap align-middle table-borderless mb-0">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th scope="col">Product Details</th>
                                    <th scope="col" class="text-center">Total Price</th>
                                    <th scope="col" class="text-center">Quantity</th>
                                    <th scope="col" class="text-center">Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->order_products as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-md bg-light rounded p-1"
                                                    style="height: 5.5rem;width: 5.5rem;">
                                                    <img src="{{ $product->product->product_picture_url }}" alt=""
                                                        class="img-fluid d-block">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="fs-15"><a
                                                            class="link-primary">{{ $product->product->name }}</a>
                                                    </h5>
                                                    <p class="text-muted mb-0">SKU: <span
                                                            class="fw-medium">{{ $product->product->sku }}</span></p>
                                                    <p class="text-muted mb-0">Category: <span
                                                            class="fw-medium">{{ $product->product->category->name }}</span>
                                                    </p>
                                                    <p class="text-muted mb-0">Manufacturer: <span
                                                            class="fw-medium">{{ $product->product->manufacturer->name }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- {{ dd($product->toArray()) }} --}}
                                        <td class="fw-medium text-center">USD {{ $product->price_with_markup }}</td>
                                        <td class="fw-medium text-center">{{ $product->quantity }}</td>
                                        <td class="fw-medium text-center">
                                            USD {{ $product->total_price }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Payment & Invoice Information</h5>
                        <div class="flex-shrink-0">
                            <span class="badge bg-info p-2" style="font-size: 15px">Payment Status:
                                {{ $order->payment_status }}</span>
                            <span class="badge bg-warning p-2" style="font-size: 15px">Due Date:</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-nowrap align-middle table-borderless mb-0">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th scope="col" class="text-center">Payment Amount</th>
                                    <th scope="col" class="text-center">Payment Method</th>
                                    <th scope="col" class="text-center">Payment Status</th>
                                    <th scope="col" class="text-center">Payment Due Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="fw-medium text-center">USD {{ $total_price }}</td>
                                    <td class="fw-medium text-center">{{ $order->payment_method->payment_method }}</td>
                                    <td class="fw-medium text-center">{{ $order->payment_status }}</td>
                                    <td class="fw-medium text-center">
                                        {{ $order->payment_due_date == null ? 'N/A' : $order->payment_due_date }} </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Order Commission</h5>
                        <div class="flex-shrink-0">
                            <span class="badge bg-info p-2" style="font-size: 15px">Delivery Status:
                                {{ $order->delivery_status }}</span>
                            <span class="badge bg-warning p-2" style="font-size: 15px">Due Date:</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-nowrap align-middle table-borderless mb-0">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th scope="col" class="text-center">Customer ID</th>
                                    <th scope="col" class="text-center">Customer Name</th>
                                    <th scope="col" class="text-center">Tier Type</th>
                                    <th scope="col" class="text-center">Product ID</th>
                                    <th scope="col" class="text-center">Product Name</th>
                                    <th scope="col" class="text-center">Product Tier Commission</th>
                                    <th scope="col" class="text-center">Tier Commission</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->product_commissions as $commission)
                                    <tr>
                                        <td class="fw-medium text-center">
                                            {{ $order->customer_id }}
                                        </td>
                                        <td class="fw-medium text-center">
                                            {{ $order->customer->full_name }}
                                        </td>
                                        <td class="fw-medium text-center">{{ $commission->tier_type }}</td>
                                        <td class="fw-medium text-center">{{ $commission->product_id }} </td>
                                        <td class="fw-medium text-center">{{ $commission->product->name }}</td>
                                        <td class="fw-medium text-center">
                                            {{ $commission->tier_commission_percentage }} %
                                            @if (isset($commission->commission_got_percentage))
                                                | {{ $commission->commission_got_percentage }} %
                                            @endif
                                        </td>
                                        <td class="fw-medium text-center">USD {{ $commission->tier_commission }}
                                            @if (isset($commission->commission_got))
                                                | USD {{ $commission->commission_got }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
