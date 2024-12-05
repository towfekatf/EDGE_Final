@extends("Admin.layouts.master")
@section("title", "View Cart Item")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Cart Item</h1>
            <a href="{{ route('Admin.cartItems.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to Cart Items</a>
        </div>

        <!-- Display Cart Item Details -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <label for="customer_id" class="col-sm-3 col-form-label text-right font-weight-bold">Customer*</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="customer_id" name="customer_id" disabled>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" {{ $cartItem->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="menu_item_id" class="col-sm-3 col-form-label text-right font-weight-bold">Menu Item *</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="menu_item_id" name="menu_item_id" disabled>
                            @foreach ($menuItems as $menuItem)
                                <option value="{{ $menuItem->id }}" {{ $cartItem->menu_item_id == $menuItem->id ? 'selected' : '' }}>{{ $menuItem->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="quantity" class="col-sm-3 col-form-label text-right font-weight-bold">Quantity *</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $cartItem->quantity }}" disabled>
                    </div>
                </div>
                <!-- Add more details if needed -->
            </div>
        </div>
    </div>
@endsection
