@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Customers</h4>
                {{-- @permission('add-course') --}}
                <div class="flex-shrink-0">
                    <a href="{{ route('course.create') }}" class="btn btn-success btn-label btn-sm">
                        <i class="ri-add-fill label-icon align-middle fs-16 me-2"></i> Add New
                    </a>
                </div>
                {{-- @endpermission --}}
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="customers-data-table"
                        class="table table-bordered table-striped align-middle table-nowrap mb-0" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Abbreviation</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Abbreviation</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <input id="ajaxRoute" value="{{ route('customers.index') }}" hidden />
@endsection


@push('header_scripts')
@endpush

@push('footer_scripts')
    <script type="text/javascript" src="{{ asset('modules/customers.js') }}"></script>
@endpush
