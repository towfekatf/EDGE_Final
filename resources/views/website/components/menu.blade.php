<div class="heading_container heading_center">
    <h2 class="display-4 py-3 text-center">
        Our Menu
    </h2>
</div>

<ul class="nav justify-content-center mt-4">
    @foreach ($categories as $category)
        <li class="nav-item mx-2">
            <a href="{{ route('website.menu', $category->slug) }}"
               class="btn btn-light nav-link {{ $selectedCategory == $category->slug ? 'active' : '' }}" >
                {{ $category->name }}
            </a>
        </li>
    @endforeach
</ul>
