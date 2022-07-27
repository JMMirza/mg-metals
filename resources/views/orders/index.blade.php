@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Products Commission</h4>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="customer-orders-data-table"
                        class="table table-bordered table-striped align-middle table-nowrap mb-0" style="width:100%">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Type</th>
                                {{-- <th>Product ID</th>
                                <th>Product SKU</th>
                                <th>Product Name</th> --}}
                                <th>Delivery Method</th>
                                {{-- <th>Mark Up</th> --}}
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Shipping Address</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <th>Customer ID</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Type</th>
                                <th>Product ID</th>
                                <th>Product SKU</th>
                                <th>Product Name</th>
                                <th>Delivery Method</th>
                                <th>Spot Price</th>
                                <th>Mark Up</th>
                                <th>Quantity</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
    <input id="ajaxRoute" value="{{ route('orders.index') }}" hidden />
@endsection


@push('header_scripts')
@endpush

@push('footer_scripts')
    <script type="text/javascript" src="{{ asset('modules/orders.js') }}"></script>
@endpush
