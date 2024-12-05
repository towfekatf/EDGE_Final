@extends("Admin.layouts.master")
@section("title", "Edit Customer")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Customer</h1>
            <a href="{{ route("admin.customers.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> customers index</a>
        </div>

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

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route("admin.customers.update", $customer->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label text-right font-weight-bold">Name *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" value="{{ old("name", $customer->name) }}"
                                   name="name"
                                   autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label text-right font-weight-bold">Email *</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" value="{{ old("email", $customer->email) }}"
                                   name="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label text-right font-weight-bold">Address </label>
                        <div class="col-sm-6">
                            <textarea name="address" id="address" class="form-control" >{{ $customer->address }}</textarea>
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
                            <input type="file" class="form-control" id="image" name="image" >
                        </div>
                    </div>



                    <div class="form-group row mb-4">
                        <label for="password" class="col-sm-3 col-form-label text-right font-weight-bold">Password*
                        </label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="form-text text-muted">Password minimum 6 digits</small>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="password_confirmation" class="col-sm-3 col-form-label text-right font-weight-bold">Confirm
                            Password*
                        </label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
