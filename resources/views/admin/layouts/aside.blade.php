<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <li>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <h6 class="sidebar-brand-text mx-3 mt-2 font-weight-bold" title="Khulna Divisional Association of Buffalo New York">restaurant</h6>
        </a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item  {{ request()->routeIs('home') ? 'active' : '' }} ">

        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{
    request()->routeIs('admin.categories.index') ||
    request()->routeIs('admin.categories.create') ||
    request()->routeIs('admin.categories.show') ||
    request()->routeIs('admin.categories.edit')
    ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.categories.index') }}">
            <i class="fa-solid fa-layer-group"></i>
            <span>Category</span>
        </a>
    </li>

    <li class="nav-item {{
    request()->routeIs('admin.menuItems.index') ||
    request()->routeIs('admin.menuItems.create') ||
    request()->routeIs('admin.menuItems.show') ||
    request()->routeIs('admin.menuItems.edit')
    ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.menuItems.index') }}">
            <i class="fa-solid fa-sitemap"></i>
            <span>MenuItems</span>
        </a>
    </li>

    <li class="nav-item {{
    request()->routeIs('admin.customers.index') ||
    request()->routeIs('admin.customers.create') ||
    request()->routeIs('admin.customers.show') ||
    request()->routeIs('admin.customers.edit')
    ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.customers.index') }}">
            <i class="fa-solid fa-person-military-pointing"></i>
            <span>Customers</span>
        </a>
    </li>

    <li class="nav-item {{
    request()->routeIs('admin.orders.index') ||
    request()->routeIs('admin.orders.show')
    ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.orders.index') }}">
            <i class="fa-brands fa-first-order"></i>
            <span>Orders</span>
        </a>
    </li>



    <li class="nav-item  {{
    request()->routeIs("admin.settings.index") ||
    request()->routeIs("admin.settings.update")
    ? "active" : "" }}">
        <a class="nav-link" href="{{ route("admin.settings.index") }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span>
        </a>
    </li>

</ul>
