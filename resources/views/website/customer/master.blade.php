@extends("website.layouts.master")

@section("content")
    <section class="mt-5 registration">
        <div class="container px-5">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session()->has("success"))
                        <div class="alert alert-success">
                            {{ session("success") }}
                        </div>
                    @endif

                    @if (session()->has("error"))
                        <div class="alert alert-danger">
                            {{ session("error") }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <div class="mt-1">
                        @include('website.customer.menu')
                    </div>
                </div>
                <div class="col-9">
                    @yield('customer-content')
                </div>
            </div>
        </div>
    </section>
@endsection