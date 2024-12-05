@extends('website.customer.master')
@section("title", "Food Order")

@section('customer-content')
    <h2 class="text-center py-4 bg-primary text-white">Orders</h2>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($deliveryAddresses as $deliveryAddress)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $deliveryAddress->name }}</td>
                            <td>{{ $deliveryAddress->phone }}</td>
                            <td>{{ $deliveryAddress->email }}</td>
                            <td>
                                <a href="{{ route('website.customer.order.show', $deliveryAddress->order_id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No delivery addresses found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
