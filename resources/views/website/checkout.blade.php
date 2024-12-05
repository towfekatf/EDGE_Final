@php use App\Helper; @endphp
@extends("website.layouts.master")

@section("title", "Food About")

@section("content")
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 mb-4">

                    <!-- Display error and success messages -->
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

                    <!-- Guest Checkout Form -->
                    <div class="card shadow-0 border">
                        <div class="p-4">
                            <h5 class="card-title mb-3">Delivery Address</h5>
                            <form action="{{ route('order') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="name" class="mb-0">Name*</label>
                                        <div class="form-outline">
                                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Type here" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="phone" class="mb-0">Phone*</label>
                                        <div class="form-outline">
                                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="email" class="mb-0">Email</label>
                                        <div class="form-outline">
                                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="example@gmail.com" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="address" class="mb-0">Address*</label>
                                        <div class="form-outline">
                                            <textarea id="address" name="address" placeholder="Type here" class="form-control">{{ old('address') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="note" class="mb-0">Note</label>
                                        <div class="form-outline">
                                            <textarea id="note" name="note" placeholder="Type here" class="form-control">{{ old('note') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment Options -->
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mt-5 mb-3">Payment</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="payment_method" id="cash_on_delivery" value="Cash On Delivery" @checked('Cash On Delivery' == old('payment_method')) />
                                            <label class="form-check-label" for="cash_on_delivery">
                                                <img src="{{ asset('asset/images/c2.png') }}" alt="Cash on Delivery" height="20"> Cash on delivery
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="payment_method" id="bkash" value="bKash" @checked('bKash' == old('payment_method')) />
                                            <label class="form-check-label" for="bkash">
                                                <img src="{{ asset('asset/images/bKash.png') }}" alt="bKash" height="30"> bKash ({{ Helper::BKASH_NUMBER }})
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="float-end mt-4">
                                            <button type="button" class="btn btn-light border">Cancel</button>
                                            <button type="submit" class="btn btn-success shadow-0 border">Continue</button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="alert alert-primary mt-4" role="alert">
                                            <strong>Note:</strong> Receive your 'bKash' transaction number after payment
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Cart Summary -->
                @php $subtotal = 0; @endphp

                @if(!empty($carts))
                    @foreach($carts as $cart)
                        @php $subtotal += $cart['total']; @endphp
                    @endforeach

                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center">Cart Summary</h4>
                                <button type="button" class="btn btn-success mb-3" data-toggle="dropdown">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                                    <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                </button>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong>Subtotal</strong>
                                        <span>{{ Helper::CURRENCY_SYMBOL }}{{ number_format($subtotal, 2) }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong>You Pay</strong>
                                        <span>{{ Helper::CURRENCY_SYMBOL }}{{ number_format($subtotal, 2) }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
