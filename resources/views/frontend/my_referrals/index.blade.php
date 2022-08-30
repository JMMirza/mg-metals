@extends('frontend.layouts.master')

@section('content')
    @include('frontend.my_referrals.header')

    <section class="page-section pt-5" id="about">
        <div class="container relative">
            <div class="card mt-30 mb-30">
                <div class="card-header">
                    <h5 class="card-title flex-grow-1 mb-0">My Referrals</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped align-middle table-nowrap mb-0 mb-4" style="width:100%">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Gender</th>
                                <th>Customer Occupation</th>
                                {{-- <th>Agent Code</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($referrals as $referral)
                                <tr>
                                    <td>{{ $referral->id }}</td>
                                    <td>{{ $referral->name }}</td>
                                    <td>{{ $referral->email }}</td>
                                    <td>{{ $referral->customer->gender }}</td>
                                    <td>{{ $referral->customer->occupation }}</td>
                                    {{-- <td>{{ $referral->referral_code }}</td> --}}
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
