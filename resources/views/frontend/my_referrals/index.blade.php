@extends('frontend.layouts.master')

@section('content')
    @include('frontend.my_referrals.header')

    <section class="page-section" id="about">
        <div class="container relative">
            <div class="section-text mb-60 mb-sm-40">
                <h2>My Referrals</h2>
                <table class="table table-bordered table-striped align-middle table-nowrap mb-0 mt-5" style="width:100%">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Customer Gender</th>
                            <th>Customer Occupation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($referrals as $referral)
                            <tr>
                                <td>{{ $referral->id }}</td>
                                <td>{{ $referral->name }}</td>
                                <td>{{ $referral->email }} USD</td>
                                <td>{{ $referral->customer->gender }}</td>
                                <td>{{ $referral->customer->occupation }}</td>
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
