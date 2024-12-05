@extends("Admin.layouts.master")
@section("title", "Restaurant Details")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Restaurant Details</h1>
            <a href="{{ route("Admin.restaurant.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to Restaurants
            </a>
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


                <form action="{{ route("Admin.restaurant.store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label text-right font-weight-bold">Name *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" value="{{ $restaurant->name }}"
                                   name="name" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contact_info" class="col-sm-3 col-form-label text-right font-weight-bold">Contact Info *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="contact_info" value="{{ $restaurant->contact_info }}"
                                   name="contact_info" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="operating_hours" class="col-sm-3 col-form-label text-right font-weight-bold">Operating Hours *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="operating_hours" value="{{ $restaurant->operating_hours }}"
                                   name="operating_hours" disabled>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="address"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Address *</label>
                        <div class="col-sm-6">
                            <textarea name="address" id="address" class="form-control" disabled>{{ $restaurant->address }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="is_available" class="col-sm-3 col-form-label text-right font-weight-bold"></label>
                        <div class="col-sm-6">
                            <input type="checkbox" class="form-check-input" id="is_available" name="is_available" {{ $restaurant->is_available ? 'checked' : '' }} disabled>
                            <label class="form-check-label font-weight-bold" for="is_available"> Is Available</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
