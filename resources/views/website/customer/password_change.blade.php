@extends('website.customer.master')
@section("title", "Password Change")

@section('customer-content')
    <h2 class="text-center py-4 bg-primary text-white">Profile</h2>

    <div class="mt-5">
        <form action="{{ route('website.customer.password_update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row mb-4">
                <label for="password" class="col-sm-3 col-form-label text-right font-weight-bold">Password
                </label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="form-text text-muted">
                        Password minimum 6 digits.<br>
                        If you input a new password, the previous password will change otherwise there will
                        be no change.</small>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label for="password_confirmation"
                       class="col-sm-3 col-form-label text-right font-weight-bold">Confirm Password
                </label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password_confirmation"
                           name="password_confirmation">
                </div>
            </div>

            <div class="form-group row mb-4">
                <label for="" class="col-sm-3 col-form-label text-right font-weight-bold"></label>
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary w-100">Update Password</button>
                </div>
            </div>
        </form>
    </div>
@endsection
