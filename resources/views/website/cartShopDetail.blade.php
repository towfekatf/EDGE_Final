@php use App\Helper; @endphp
@extends("website.layouts.master")
@section("title", "Food Cart Shop Detail")
@section("content")

    <h2 class="checkout">Responsive Checkout Form</h2>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-success text-center">
                        <tr>
                            <th>IMAGE</th>
                            <th>NAME</th>
                            <th>PRICE</th>
                            <th style="width: 150px">QUANTITY</th>
                            <th>TOTAL</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">

                        @php
                        $subtotal = 0;
                        @endphp
                            @if(!empty($carts))
                                @foreach($carts as $i => $cart)
                                    @php
                                        $subtotal += $cart['total'];
                                    @endphp
                                    <tr data-id="{{ $i }}">
                                        <td class="image" data-title="No">
                                            <img src="{{ asset('storage/uploads/menuItems/' . $cart['product']->image) }}"
                                                 height="70px" alt="">
                                        </td>
                                        <td class="menuItem-des" data-title="Description">
                                            <p class="menuItem-name">{{ $cart['product']->name }}</p>
                                        </td>
                                        <td class="price" data-title="Price">
                                            <span>{{ Helper::CURRENCY_SYMBOL }}{{ $cart['price'] }}</span>
                                        </td>
                                        <td class="qty" data-title="Qty">
                                            <div class="input-group quantity">
                                                <div class="input-group-prepend">
                                                    <a href="{{ route('website.addToCart', $cart['product']->id) . '?action=delete' }}" class="btn btn-primary btn-decrement text-light" type="button">
                                                        <i class="fa fa-minus"></i>
                                                    </a>
                                                </div>
                                                <input type="text" class="form-control text-center quantity-input"
                                                       value="{{ $cart['quantity'] }}" disabled/>
                                                <div class="input-group-append">
                                                    <a href="{{ route('website.addToCart', $cart['product']->id) }}"
                                                       class="btn btn-primary btn-increment text-light" type="button">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-amount cart_single_price" data-title="Total">
                                            <span class="money">{{ Helper::CURRENCY_SYMBOL }}{{ number_format($cart['total'], 2) }}</span>
                                        </td>
                                        <td class="action" data-title="Remove">
                                            <a href="{{ route('website.removeFromCart', $i) }}" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Cart Summary</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Subtotal</strong>
                                <span>{{ Helper::CURRENCY_SYMBOL }}{{ number_format($subtotal, 2) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>You Pay</strong>
                                <span>{{ Helper::CURRENCY_SYMBOL }}{{ number_format($subtotal, 2) }}</span>
                            </li>
                            <li>
                                <div class="row mt-3">
                                    <div class="col-lg-4">
                                        @auth('customer')
                                            <a href="{{ route('checkout.index')}}" class="btn btn-primary me-2" role="button">Checkout</a>
                                        @else
                                            <a href="{{ route('checkout.index')}}?redirect={{ route('checkout.index') }}" class="btn btn-primary me-2" role="button">Checkout</a>
                                        @endauth
                                    </div>
                                    <div class="col-lg-8 pr-3">
                                        <a href="#" class="btn btn-secondary" role="button">Continue Shopping</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
