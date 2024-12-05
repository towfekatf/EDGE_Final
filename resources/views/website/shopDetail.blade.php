@extends("website.layouts.master")
@section("title", "Food Shop Detail")
@section("content")


    <div class="container">
        <div class="col-lg-12 p-3 bg-white">
            <div class="row m-0">
                <div class="col-lg-4 left-side-product-box pb-3">
                    <img  src="{{ asset("storage/uploads/menuItems/$menuItem->image") }}" alt="{{ $menuItem->name }}">
                    <span class="sub-img">
                     <img class="ml-4" src="{{ asset("storage/uploads/menuItems/$menuItem->image") }}" alt="{{ $menuItem->name }}">
                </span>
                </div>
                <div class="col-lg-8">
                    <div class="right-side-pro-detail p-3 m-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>{{ $menuItem->name }}</h3>
                                @php
                                    $reviews = $menuItem->getReview;
                                    $rate = $reviews ? ceil($reviews->avg('rate')) : 0;
                                @endphp
                                @for($i = 1; $i <= 5; $i++)
                                    @if($rate >= $i)
                                        <i class="fa-solid fa-star text-warning"></i>
                                    @else
                                        <i class="fa-regular fa-star text-warning"></i>
                                    @endif
                                @endfor
                                <a href="#" class="total-review">({{ $reviews ? $reviews->count() : 0 }}) Review</a>
                            </div>
                            <div class="col-lg-12">
                                <span style="font-weight: bold; font-size:30px" >
                                    $@php
                                        $after_discount = $menuItem->price - (($menuItem->price * $menuItem->discount) / 100);
                                    @endphp
                                    {{ number_format($after_discount, 2) }}
                                    <!-- Display the calculated price with two decimal places -->
                                </span>
                            </div>
                            <div class="col-lg-12 pt-2">
                                <p>{{ $menuItem->description }}</p>
                                <p>Category :{{$menuItem->name}}</p>
                                <p>Sub Category :{{$menuItem->slug}}</p>
                            </div>

                            <div class="input-group quantity">
                                <div class="input-group-prepend">
                                    <a href="{{ route('website.addToCart', $menuItem->id) . '?action=delete' }}" class="btn btn-primary btn-decrement text-light" type="button">
                                        <i class="fa fa-minus"></i>
                                    </a>
                                </div>
                                <input type="text" class="form-control text-center quantity-input"
                                       value="1" disabled/>
                                <div class="input-group-append">
                                    <a href="{{ route('website.addToCart', $menuItem->id) }}"
                                       class="btn btn-primary btn-increment text-light" type="button">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>




                            <div class="col-lg-12 mt-3">
                                <div class="row">
                                    <div class="col-lg-3 pb-2">
                                        <a href="{{route('website.addToCart', $menuItem->id)}}" class="btn btn-danger w-100">Add To Cart</a>
                                    </div>
                                    <div class="col-lg-3">
                                        <a href="#" class="btn btn-success w-100">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection


