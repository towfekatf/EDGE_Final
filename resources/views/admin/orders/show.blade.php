@extends("Admin.layouts.master")
@section("title", "Show Order")
@section("content")
    @php use App\Helper; @endphp
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Show orders</h1>
            <a href="{{ route('admin.orders.index') }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to Orders</a>
        </div>

        <!-- Display Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Success Message -->
        @if (session()->has("success"))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session("success") }}
            </div>
        @endif

        <!-- Error Message -->
        @if (session()->has("error"))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session("error") }}
            </div>
        @endif

        <section class="bg-light py-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 mb-4">
                        <!-- Order Details Card -->
                        <div class="card shadow-0 border">
                            <div class="p-4">
                                <h5 class="card-title mb-3">Order Details</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong>Order Status:</strong>
                                        <span>{{ $order->status }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong>Order Date:</strong>
                                        <span>{{ $order->created_at ? $order->created_at->format('d M Y') : 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong>Total Amount:</strong>
                                        <span>{{ Helper::CURRENCY_SYMBOL }}{{ number_format($totalAmount, 2) }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Delivery Address Card -->
                        <div class="card shadow-0 border mt-4">
                            <div class="p-4">
                                <h5 class="card-title mb-3">Delivery Address</h5>
                                <ul class="list-group list-group-flush">
                                    @if($order->deliveryAddress)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Name:</strong>
                                            <span>{{ $order->deliveryAddress->name }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Phone:</strong>
                                            <span>{{ $order->deliveryAddress->phone }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Email:</strong>
                                            <span>{{ $order->deliveryAddress->email }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Address:</strong>
                                            <span>{{ $order->deliveryAddress->address }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Note:</strong>
                                            <span>{{ $order->deliveryAddress->note }}</span>
                                        </li>
                                    @else
                                        <li class="list-group-item d-flex justify-content-between align-items-center">No delivery address found.</li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <!-- Payment Details Card -->
                        <div class="card shadow-0 border mt-4">
                            <div class="p-4">
                                <h5 class="card-title mb-3">Payment Details</h5>
                                <ul class="list-group list-group-flush">
                                    @if($order->payment)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Payment Method:</strong>
                                            <span>{{ $order->payment->payment_method }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Payment Status:</strong>
                                            <span>{{ $order->payment->status }}</span>
                                        </li>
                                        @if($order->payment->transaction_id)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong>Transaction ID:</strong>
                                                <span>{{ $order->payment->transaction_id }}</span>
                                            </li>
                                        @endif
                                    @else
                                        <li class="list-group-item">No payment details found.</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Order Items Summary -->
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center">Order Items</h4>
                                <ul class="list-group list-group-flush">
                                    @foreach($order->orderItems as $item)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>{{ $item->menu_item_name }}</strong>
                                                <br>
                                                Quantity: {{ $item->quantity }}
                                            </div>
                                            <span>{{ Helper::CURRENCY_SYMBOL }}{{ number_format($item->price, 2) }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
