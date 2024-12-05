@extends("Admin.layouts.master")
@section("title", "cartItems")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">cartItems</h1>
            <a href="{{ route("Admin.cartItems.create") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i>Create cartItems</a>
        </div>

        @if (session()->has("success"))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session("success") }}
            </div>
        @endif

        @if (session()->has("error"))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session("error") }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Customer</th>
                            <th>quantity</th>
                            <th style="width: 100px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $i => $cartItem)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $cartItem->customer->name}}</td>
                                <td>{{ $cartItem->quantity }}</td>

                                <td>
                                    <a href="{{ route("Admin.cartItems.show", $cartItem->id) }}" class="btn btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route("Admin.cartItems.edit", $cartItem->id) }}" class="btn btn-sm"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route("Admin.cartItems.destroy", $cartItem->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm" onclick="return confirm('Are you sure to delete?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
