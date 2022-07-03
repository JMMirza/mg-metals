@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Customer Order</h4>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="products-commission-data-table"
                        class="table table-bordered table-striped align-middle table-nowrap mb-0" style="width:100%">
                        <thead>
                            <tr>
                                <th>Customer name</th>
                                <th>Tier Type</th>
                                <th>Product name</th>
                                <th>Product Price</th>
                                <th>Product Mark up</th>
                                <th>Product Tier Commission</th>
                                <th>Tier Commission</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Customer name</th>
                                <th>Tier Type</th>
                                <th>Product name</th>
                                <th>Product Price</th>
                                <th>Product Mark up</th>
                                <th>Product Tier Commission</th>
                                <th>Tier Commission</th>
                                <th>Created At</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <input id="ajaxRoute" value="{{ route('product-commission.index') }}" hidden />
@endsection


@push('header_scripts')
@endpush

@push('footer_scripts')
    <script type="text/javascript" src="{{ asset('modules/product_commission.js') }}"></script>
@endpush
