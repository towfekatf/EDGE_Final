@extends("Admin.layouts.master")
@section("title", "View Customer")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Customer</h1>
            <a href="{{ route("admin.customers.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Back to customers index</a>
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

        <!-- Customer Details -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label text-right font-weight-bold">Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="name" value="{{ $customer->name }}"
                               name="name" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label text-right font-weight-bold">Email</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="name" value="{{ $customer->email }}"
                               name="name" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-sm-3 col-form-label text-right font-weight-bold">Address</label>
                    <div class="col-sm-6">
                        <textarea name="address" id="address" class="form-control" disabled>{{ $customer->email }}</textarea>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="image" class="col-sm-3 col-form-label text-right font-weight-bold">Existing Image</label>

                    <div class="col-sm-6">
                        @if (file_exists(public_path("storage/uploads/customers/$customer->image")) && !empty($customer->image))
                            <img src="{{ asset("storage/uploads/customers/$customer->image") }}" width="120" alt="">
                        @else
                            <img src="{{ asset("member.png") }}" width="120" alt="Placeholder">
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="image" class="col-sm-3 col-form-label text-right font-weight-bold">Image</label>

                    <div class="col-sm-6">
                        <input type="file" class="form-control" id="image" name="image" disabled>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
