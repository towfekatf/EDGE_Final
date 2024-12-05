@extends("website.layouts.master")
@section("title", "Food Index")
@section("content")
    @include('website.components.hero', ['height' => '40vh'])

    <section class="offer_section layout_padding-bottom">
        <div class="offer_container">
            <div class="container ">
                <div class="row">
                    <div class="col-md-6  ">
                        <div class="box ">
                            <div class="img-box">
                                <img src="{{asset('asset/images/o1.jpg')}}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Tasty Thursdays
                                </h5>
                                <h6>
                                    <span>20%</span> Off
                                </h6>
                                <a href="">
                                    Order Now <i class="fa-solid fa-cart-shopping text-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  ">
                        <div class="box ">
                            <div class="img-box">
                                <img src="{{asset('asset/images/o2.jpg')}}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Pizza Days
                                </h5>
                                <h6>
                                    <span>15%</span> Off
                                </h6>
                                <a href="">
                                    Order Now<i class="fa-solid fa-cart-shopping text-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="food_section layout_padding-bottom">
        <div class="container">
            @component('website.components.menu')
                @slot('categories', $categories)
                @slot('selectedCategory', $selectedCategory)
            @endcomponent

            <div class="filters-content">
                <div class="row grid">
                    @foreach ($menuItems as $menuItem)
                        @component('website.components.menu-item')
                            @slot('menuItem', $menuItem)
                        @endcomponent
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @include('website.components.about')
@endsection
