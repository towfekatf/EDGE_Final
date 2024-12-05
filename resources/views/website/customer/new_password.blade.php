@extends("website.layouts.master")
@section("title", "New Password")
@section("content")

    <div class="banner-area d-flex align-items-center"
         style="background-image:url('{{ asset("storage/uploads/$settings[SETTING_PAGE_BANNER]") }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-text">
                        <h1 class="text-center">New Password</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container my-5">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session()->has("error"))
                        <div class="alert alert-danger">
                            {{ session("error") }}
                        </div>
                    @endif

                    @if (session()->has("success"))
                        <div class="alert alert-success">
                            {{ session("success") }}
                        </div>
                    @endif

                    <form action="{{ route('website.customer.new_password', $token) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="form-group mb-4">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" value="" class="form-control" id="password"
                                   autofocus>
                        </div>

                        <div class="form-group mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" value="" class="form-control"
                                   id="password_confirmation" autofocus>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


