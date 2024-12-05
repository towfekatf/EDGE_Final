@php use App\Helper;use Illuminate\Support\Facades\Auth; @endphp
<header class="header bg-dark sticky-top">
    <div class="container">
        <nav class="navbar mb-3 navbar-expand-lg navbar-light bg-dark">
            <a href="#" class="navbar-brand">
                <img src="{{ asset('storage/uploads/' . $settings['SETTING_SITE_LOGO']) }}"
                     class="img-fluid"
                     alt="{{ $settings['SETTING_SITE_LOGO'] }}"
                     style="max-height: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('website.home') ? 'active' : '' }}"
                           href="{{route('website.home')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link text-white {{ request()->routeIs('website.menu') ? 'active' : '' }}"
                           href="{{route('website.menu')}}">Menu</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link text-white {{ request()->routeIs('website.about') ? 'active' : '' }}"
                           href="{{route('website.about')}}">About</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link text-white {{ request()->routeIs('website.contact') ? 'active' : '' }}"
                           href="{{route('website.contact')}}">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto d-flex align-items-center">
                    @auth('customer')
                        @php
                            $customer = Auth::guard('customer')->user();
                            $customerName = $customer->name;
                            $customerImage = $customer->profile_image;
                        @endphp
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{ route('website.customer.profile') }}"
                               class="nav-link text-white d-flex align-items-center">
                                @if (file_exists(public_path("storage/uploads/customers/$customer->image")) && !empty($customer->image))
                                    <img src="{{ asset("storage/uploads/customers/$customer->image") }}" id="croppie_image_show" width="50" height="50" alt="">
                                @else
                                    <img src="{{ asset("user.jpg") }}" id="croppie_image_show" width="50" height="50" alt="Member Image">
                                @endif
                                <span class="ml-2">{{ $customerName }}</span>
                            </a>
                        </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('website.registration') }}" class="nav-link text-white">
                            Registration
                            <i class="fa-regular fa-registered text-white"></i>
                        </a>
                    </li>

                        <li class="nav-item">
                            <a href="{{ route('website.customer.login') }}" class="nav-link text-white">
                                Login
                                <i class="fa-solid fa-arrow-right-to-bracket text-white"></i>
                            </a>
                        </li>
                    @endauth



                        <li class="col-lg-12 nav-item dropdown pl-4" >
                            <button type="button" class="btn btn-success" data-toggle="dropdown">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                                <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                            </button>
                            @php
                                $subtotal = 0;
                            @endphp
                            @if(!empty($carts))
                                @foreach($carts as $cart)
                                    @php
                                        $subtotal += $cart['total'];
                                    @endphp
                                @endforeach

                                <div class="col-lg-12 dropdown-menu p-3 mt-2" aria-labelledby="cartDropdown">
                                    <div class="row total-header-section">
                                        <div class="col-12 text-right">
                                            <span class="money">Total: {{ Helper::CURRENCY_SYMBOL }}{{ number_format($subtotal, 2) }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    @foreach($carts as $cart)
                                        <div class="row cart-detail align-items-center mb-3">
                                            <div class="col-4 cart-detail-img">
                                                <img src="{{ asset('storage/uploads/menuItems/' . $cart['product']->image) }}" height="40px" alt="">
                                            </div>
                                            <div class="col-8">
                                                <p class="mb-1 font-weight-bold">{{ $cart['product']->name }}</p>
                                                <span class="price text-info d-block">{{ Helper::CURRENCY_SYMBOL }}{{ number_format($cart['price'], 2) }}</span>
                                                <span class="count">Quantity: {{ $cart['quantity'] }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <a href="{{ route('website.cartShopDetails') }}" class="btn btn-primary btn-block">View all</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </li>
                </ul>


            </div>
        </nav>
    </div>
</header>
