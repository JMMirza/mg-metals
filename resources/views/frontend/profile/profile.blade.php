@extends('frontend.layouts.master')


@section('content')
    @include('frontend.profile.header')


    <div class="main-content">
        <div class="page-content">
            <div class="container-fuild center-aligned">
                <div class="row">

                    <div class="col-md-12">

                        <ul class="nav nav-tabs tpl-tabs animate" role="tablist">

                            <li class="nav-item">
                                <a href="#item-1" aria-controls="item-1"
                                    class="nav-link {{ request()->query('tab') == 'individual' ? 'active' : '' }}"
                                    data-bs-toggle="tab" role="tab" aria-selected="true">APPLICANT INFORMATION
                                    (INDIVIDUAL)
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#item-2" aria-controls="item-2"
                                    class="nav-link {{ request()->query('tab') == 'corporate' ? 'active' : '' }}"
                                    data-bs-toggle="tab" role="tab" aria-selected="false">APPLICANT INFORMATION
                                    (CORPORATE)
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#item-3" aria-controls="item-3"
                                    class="nav-link {{ request()->query('tab') == 'shareholder' ? 'active' : '' }}"
                                    data-bs-toggle="tab" role="tab" aria-selected="false">SHAREHOLDER/DIRECTOR
                                    INFORMATION </a>
                            </li>

                            <li class="nav-item">
                                <a href="#item-4" aria-controls="item-4"
                                    class="nav-link {{ request()->query('tab') == 'trading' ? 'active' : '' }}"
                                    data-bs-toggle="tab" role="tab" aria-selected="false">AUTHORIZED TRADING
                                    REPRESENTATIVE </a>
                            </li>

                            <li class="nav-item">
                                <a href="#item-5" aria-controls="item-5"
                                    class="nav-link {{ request()->query('tab') == 'other_info' ? 'active' : '' }}"
                                    data-bs-toggle="tab" role="tab" aria-selected="false">OTHER INFORMATION </a>
                            </li>

                            <li class="nav-item">
                                <a href="#item-6" aria-controls="item-6"
                                    class="nav-link {{ request()->query('tab') == 'bank_info' ? 'active' : '' }}"
                                    data-bs-toggle="tab" role="tab" aria-selected="false">BANK ACCOUNT FOR RECEIVING
                                    PAYMENTS </a>
                            </li>

                        </ul>
                        <div class="tab-content tpl-tabs-cont section-text">

                            <div class="tab-pane fade {{ request()->query('tab') == 'individual' ? 'active show' : '' }} "
                                id="projectSummary" role="tabpanel" id="item-1" role="tabpanel">
                                @include('frontend.profile.applicant_info_individual')
                            </div>

                            <div class="tab-pane fade {{ request()->query('tab') == 'corporate' ? 'active show' : '' }} "
                                id="item-2" role="tabpanel">
                                @if (isset($customer))
                                    @include('frontend.profile.applicant_info_corporate')
                                @endif
                            </div>

                            <div class="tab-pane fade {{ request()->query('tab') == 'shareholder' ? 'active show' : '' }} "
                                id="item-3" role="tabpanel">
                                @include('frontend.profile.shareholders.shareholder_info')
                            </div>

                            <div class="tab-pane fade {{ request()->query('tab') == 'trading' ? 'active show' : '' }} "
                                id="item-4" role="tabpanel">
                                @include('frontend.profile.authorized_trading')
                            </div>

                            <div class="tab-pane fade {{ request()->query('tab') == 'other_info' ? 'active show' : '' }} "
                                id="item-5" role="tabpanel">
                                @include('frontend.profile.other_information')
                            </div>

                            <div class="tab-pane fade {{ request()->query('tab') == 'bank_info' ? 'active show' : '' }} "
                                id="item-6" role="tabpanel">
                                @include('frontend.profile.bank_info')
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
