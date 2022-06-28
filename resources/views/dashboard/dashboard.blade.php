@extends('layouts.master')

@section('content')
    @include('layouts.flash_message')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="h-100">
                    <div class="row mb-3 pb-1">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="fs-16 mb-1">Good Morning, Anna!</h4>
                                    <p class="text-muted mb-0">Here's what's happening with your store today.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> <!-- end .h-100-->

            </div> <!-- end col -->
        </div>

    </div>
@endsection


@push('header_scripts')
@endpush

@push('footer_scripts')
@endpush
