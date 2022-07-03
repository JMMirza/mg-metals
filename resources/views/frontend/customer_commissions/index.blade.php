@extends('frontend.layouts.master')

@section('content')
    @include('frontend.customer_commissions.header')

    <section class="page-section" id="about">
        <div class="container relative">
            <div class="section-text mb-60 mb-sm-40">
                <h2>My Commissions</h2>
                <table class="table table-bordered table-striped align-middle table-nowrap mb-0 mt-5" style="width:100%">
                    <thead>
                        <tr>
                            <th>Tier Type</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Mark Up</th>
                            <th>Product Tier Commission</th>
                            <th>Tier Commission</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($commissions as $commission)
                            <tr>
                                <td>{{ ucfirst($commission->tier_type) }}</td>
                                <td>{{ $commission->product->name }}</td>
                                <td>{{ $commission->product_price }} USD</td>
                                @if ($commission->product->markup_type == 'flat')
                                    <td>{{ $commission->product_mark_up }} USD</td>
                                @else
                                    <td>{{ $commission->product_mark_up }} %</td>
                                @endif
                                <td>{{ $commission->tier_commission_percentage }} %</td>
                                <td>{{ $commission->tier_commission }} USD</td>
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
