@extends("website.layouts.master")
@section("title", "Food Login")
@section("content")
    <section class="my-5">
        <div class="container">
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

                    @if (session()->has("error"))
                        <div class="alert alert-danger shadow-sm">
                            {{ session("error") }}
                        </div>
                    @endif

                    @if (session()->has("success"))
                        <div class="alert alert-success shadow-sm">
                            {{ session("success") }}
                        </div>
                    @endif

                    <div class="card shadow-lg">
                        <div class="card-header bg-primary text-white text-center">
                            <h2>Login</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('website.customer.storeLogin') . "?" . request()->getQueryString()  }}" method="post">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control shadow-sm" id="email" autofocus>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control shadow-sm" id="password">
                                </div>
                                <button type="submit" class="btn btn-primary w-100 shadow-sm">Login</button>

                                <div class="text-center mt-4">
                                    <a href="{{ route('website.customer.forgot_password') }}" class="text-decoration-none">Forgot Password</a>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center bg-light">
                            <p>Don't have an account? <a href="{{ route('website.registration') }}">Register here</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
