@extends("website.layouts.master")
@section("title", "Food Registration")
@section("content")

    <section class="mt-5 mb-3 registration">
        <div class="container px-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if ($errors->any())
                        <div class="alert alert-danger shadow-sm">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session()->has("success"))
                        <div class="alert alert-success shadow-sm">
                            {{ session("success") }}
                        </div>
                    @endif

                    @if (session()->has("error"))
                        <div class="alert alert-danger shadow-sm">
                            {{ session("error") }}
                        </div>
                    @endif

                    <div class="card shadow-lg">
                        <div class="card-header bg-primary text-white text-center">
                            <h2>Registration</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('website.registration') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label for="name" class="col-sm-3 col-form-label text-right font-weight-bold">Name *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control shadow-sm" id="name" value="{{ old('name') }}" name="name" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="email" class="col-sm-3 col-form-label text-right font-weight-bold">Email *</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control shadow-sm" id="email" value="{{ old('email') }}" name="email">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="password" class="col-sm-3 col-form-label text-right font-weight-bold">Password *</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control shadow-sm" id="password" name="password">
                                        <small class="form-text text-muted">Password minimum 6 characters</small>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="password_confirmation" class="col-sm-3 col-form-label text-right font-weight-bold">Confirm Password *</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control shadow-sm" id="password_confirmation" name="password_confirmation">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" class="btn btn-primary w-100 shadow-sm">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center bg-light">
                            <p>Already have an account? <a href="{{ route('website.customer.login') }}">Login here</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
