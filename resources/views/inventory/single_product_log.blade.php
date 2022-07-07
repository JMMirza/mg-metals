@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Products Inventory List</h4>

            </div>
            <div class="card">
                <div class="card-body">
                    <table id="shareholders" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Units</th>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Delivery Method</th>
                                <th>Spot Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($inventories as $inventories)
                                <tr>
                                    <td>{{ $inventories->id }}</td>
                                    <td>{{ $inventories->product->name }}</td>
                                    <td>{{ $inventories->units }}</td>
                                    @if ($inventories->order != null)
                                        <td>{{ $inventories->order->id }}</td>
                                        <td>{{ $inventories->order->customer->full_name }}</td>
                                        <td>{{ $inventories->order->delivery_method }}</td>
                                        <td>{{ $inventories->order->spot_price }} USD</td>
                                    @else
                                        <td>N /A</td>
                                        <td>N /A</td>
                                        <td>N /A</td>
                                        <td>N /A</td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No Record Found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
