@extends('website.customer.master')
@section("title", "Food Customer Profile")

@section('customer-content')
    <h2 class="text-center py-4 bg-primary text-white">Profile</h2>

    <div class="mt-5">
        <form action="{{ route('website.customer.profile') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row mb-4">
                <label for="name" class="col-sm-3 col-form-label text-right font-weight-bold">Name *</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name"
                           value="{{ $customer->name }}" name="name">
                </div>
            </div>

            <div class="form-group row mb-4">
                <label for="email" class="col-sm-3 col-form-label text-right font-weight-bold">Email *</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="email"
                           value="{{ $customer->email }}" name="email">
                </div>
            </div>

            <div class="form-group row mb-4">
                <label for="address" class="col-sm-3 col-form-label text-right font-weight-bold">Address</label>
                <div class="col-sm-9">
                    <textarea name="address" id="address" class="form-control">{{ $customer->address }}</textarea>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label for="image" class="col-sm-3 col-form-label text-right font-weight-bold">Image</label>
                <div class="col-sm-2">
                    <div>
                        @if (file_exists(public_path("storage/uploads/customers/$customer->image")) && !empty($customer->image))
                            <img src="{{ asset("storage/uploads/customers/$customer->image") }}" id="croppie_image_show" width="200" height="200" alt="">
                        @else
                            <img src="{{ asset("user.jpg") }}" id="croppie_image_show" width="200" height="200" alt="Member Image">
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label for="image" class="col-sm-3 col-form-label text-right font-weight-bold"></label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="croppie_image_file" name="image" accept="image/*">
                </div>
            </div>

            <div class="form-group row mb-4">
                <label for="" class="col-sm-3 col-form-label text-right font-weight-bold"></label>
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary w-100">Profile Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
