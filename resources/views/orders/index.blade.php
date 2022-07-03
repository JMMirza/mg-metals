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
                                {{-- <th>CustomerID</th> --}}
                                <th>Customer name</th>
                                <th>Spot Price</th>
                                {{-- <th>Product id</th> --}}
                                <th>Product name</th>
                                <th>Delivery Method</th>
                                <th>Mark Up</th>
                                <th>Quantity</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                {{-- <th>CustomerID</th> --}}
                                <th>Customer name</th>
                                <th>Spot Price</th>
                                {{-- <th>Product id</th> --}}
                                <th>Product name</th>
                                <th>Delivery Method</th>
                                <th>Mark Up</th>
                                <th>Quantity</th>
                                <th>Created At</th>
                            </tr>
                        </tfoot>
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
