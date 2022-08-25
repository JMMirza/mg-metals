@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-xl-9">
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
                                    <th scope="col" class="text-center">Spot Price</th>
                                    <th scope="col" class="text-center">Markup</th>
                                    <th scope="col" class="text-center">Total Markup</th>
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
                                                <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
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
                                        <td class="fw-medium text-center">USD {{ $product->spot_price }}</td>
                                        <td class="fw-medium text-center">
                                            @if ($product->markup_type == 'percentage')
                                                {{ $product->mark_up }} %
                                            @else
                                                USD {{ $product->mark_up }}
                                            @endif

                                        </td>
                                        {{-- {{ dd($product->toArray()) }} --}}
                                        <td class="fw-medium text-center">
                                            USD {{ round($product->product->getProductCommission(), 2) }}
                                        </td>
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
                            @if ($order->payment_status == 'UNPAID')
                                <button id="change_payment_status" data-value="{{ $order->id }}"
                                    class="btn btn-warning btn-sm">UN-PAID</button>
                            @endif
                            <span class="badge bg-info p-2" style="font-size: 15px">Payment Status:
                                {{ $order->payment_status }}</span>
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
                                {{-- @foreach ($order->order_products as $product) --}}
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
                                        <td class="fw-medium text-center">{{ $commission->tier_commission_percentage }} %
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
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Order Status</h5>
                        {{-- <div class="flex-shrink-0 mt-2 mt-sm-0">
                            <a href="javasccript:void(0;)" class="btn btn-soft-danger btn-sm mt-2 mt-sm-0"><i
                                    class="mdi mdi-archive-remove-outline align-middle me-1"></i> Cancel Order</a>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="profile-timeline">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item border-0">
                                <div class="accordion-header" id="headingOne">
                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                        href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-success rounded-circle">
                                                    <i class="ri-shopping-bag-line"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-15 mb-0 fw-semibold">Order Placed - <span
                                                        class="fw-normal">{{ $order->created_at->format('D, M d, Y - h:m A') }}</span>
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body ms-2 ps-5 pt-0">
                                        <h6 class="mb-1">An order has been placed.</h6>
                                        <p class="text-muted">{{ $order->created_at->format('D, M d, Y - h:m A') }}</p>

                                        @if ($order->payment_method != 'credit card')
                                            <h6 class="mb-1">Staff has received your payment.</h6>
                                            <p class="text-muted">
                                                {{ $order->updated_at->format('D, M d, Y - h:m A') }}
                                            </p>
                                        @else
                                            <h6 class="mb-1">Staff has confirmed your payment.</h6>
                                            <p class="text-muted">
                                                {{ $order->updated_at->format('D, M d, Y - h:m A') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="accordion-item border-0">
                                <div class="accordion-header" id="headingTwo">
                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                        href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-success rounded-circle">
                                                    <i class="mdi mdi-gift-outline"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-15 mb-1 fw-semibold">Packed - <span class="fw-normal">Thu,
                                                        16 Dec 2021</span></h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body ms-2 ps-5 pt-0">
                                        <h6 class="mb-1">Your Item has been picked up by courier patner</h6>
                                        <p class="text-muted mb-0">Fri, 17 Dec 2021 - 9:45AM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <div class="accordion-header" id="headingThree">
                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                        href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-success rounded-circle">
                                                    <i class="ri-truck-line"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-15 mb-1 fw-semibold">Shipping - <span class="fw-normal">Thu,
                                                        16 Dec 2021</span></h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseThree" class="accordion-collapse collapse show"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body ms-2 ps-5 pt-0">
                                        <h6 class="fs-14">RQK Logistics - MFDS1400457854</h6>
                                        <h6 class="mb-1">Your item has been shipped.</h6>
                                        <p class="text-muted mb-0">Sat, 18 Dec 2021 - 4.54PM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <div class="accordion-header" id="headingFour">
                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                        href="#collapseFour" aria-expanded="false">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-light text-success rounded-circle">
                                                    <i class="ri-takeaway-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-14 mb-0 fw-semibold">Out For Delivery</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <div class="accordion-header" id="headingFive">
                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                        href="#collapseFile" aria-expanded="false">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-light text-success rounded-circle">
                                                    <i class="mdi mdi-package-variant"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-14 mb-0 fw-semibold">Delivered</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xl-3">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h5 class="card-title flex-grow-1 mb-0">Customer Details</h5>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0 vstack gap-3">
                        <li>
                            <span class="d-flex align-items-center">
                                <img class="rounded-circle header-profile-user"
                                    src="{{ asset('theme/dist/default/assets/images/users/user-dummy-img.jpg') }}"
                                    alt="Header Avatar">
                                <span class="text-start ms-xl-2">
                                    <h6 class="fs-14 mb-1">{{ $order->customer->full_name }}</h6>
                                    <p class="text-muted mb-0">Customer</p>
                                </span>
                            </span>
                        </li>
                        <li>
                            <span class="d-flex align-items-center">
                                <i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>
                                <span class="text-start ms-xl-2">
                                    {{ $order->customer->user->email }}
                                </span>
                            </span>
                        </li>
                        <li>
                            <span class="d-flex align-items-center">
                                <i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>
                                <span class="text-start ms-xl-2">
                                    {{ $order->phone_number }}
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i>
                        Payment Details</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                            <p class="text-muted mb-0">Transactions:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">#VLZ124561278124</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                            <p class="text-muted mb-0">Payment Method:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">
                                @if ($order->payment_method == 'bank_transfer')
                                    Bank Transfer
                                @else
                                    Credit Card
                                @endif
                            </h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                            <p class="text-muted mb-0">Card Holder Name:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">{{ $order->full_name }}</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                            <p class="text-muted mb-0">Card Number:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">xxxx xxxx xxxx 2456</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <p class="text-muted mb-0">Total Amount:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">${{ $total_price }}</h6>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Delivery
                        Information</h5>
                    <span class="badge bg-info p-2">Delivery Status:
                        {{ $order->delivery_status }}</span>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                        <li>Delivery Method - {{ $order->delivery_method->delivery_method }}</li>
                        <li class="fw-medium fs-14">{{ $order->shipping_address }}</li>
                        <li>{{ $order->full_name }}</li>
                        <li>{{ $order->phone_number }}</li>
                        <li>{{ $order->email }}</li>
                        <li>{{ $order->city }}-{{ $order->zip_code }}</li>
                        <li>{{ $order->country }}</li>
                        <li>Due Date - {{ $order->delivery_due_date }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('header_scripts')
@endpush

@push('footer_scripts')
    <script>
        $(document).on("click", "#change_payment_status", function(e) {
            var order_id = $(this).data("value");

            e.preventDefault();

            Swal.fire({
                title: "Change Payment Status",
                text: "Are you sure to Change status",
                icon: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn btn-primary w-xs me-2 mb-1',
                confirmButtonText: "Yes, I'm sure!",
                cancelButtonClass: 'btn btn-danger w-xs mb-1',
                buttonsStyling: false,
                showCloseButton: true
            }).then(function(response) {

                $.ajax({
                    url: '/change-payment-status/' + order_id,
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}",
                    },
                    type: "GET",
                    cache: false,
                    success: function(data) {
                        // alert(data);
                        // $("#customers-data-table").DataTable().ajax.reload();
                        location.reload(true);
                    },
                    error: function() {},
                });
            })
        });
    </script>
@endpush
