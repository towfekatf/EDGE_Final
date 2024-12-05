@extends("website.layouts.master")
@section("title", "Food Index")
@section("content")
    @include('website.components.hero', ['height' => '50vh'])

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
    @include('website.components.contact')
@endsection
