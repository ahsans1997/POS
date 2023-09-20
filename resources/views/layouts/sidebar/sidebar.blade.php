<div id="scrollbar">
    <div class="container-fluid">

        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Menu</span></li>

            @can('dashboard')
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="ri-dashboard-fill"></i> <span>Dashboard</span>
                    </a>
                </li>
            @endcan

            @can('products')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#products" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="products">
                        <i class="ri-product-hunt-fill"></i> <span data-key="t-base-ui">Product</span>
                    </a>
                    <div class="collapse menu-dropdown mega-dropdown-menu" id="products">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="" class="nav-link">Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">Product Categories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">Product Sub Categories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">Brands</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">Units</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            @endcan

            @can('purchases')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#purchases" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="purchases">
                        <i class="ri-file-list-fill"></i> <span data-key="t-base-ui">Purchases</span>
                    </a>
                    <div class="collapse menu-dropdown mega-dropdown-menu" id="purchases">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="" class="nav-link">Purchases</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">Purchases Returns</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            @endcan

            @can('sales')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sales" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sales">
                        <i class="ri-shopping-cart-2-fill"></i> <span data-key="t-base-ui">Sales</span>
                    </a>
                    <div class="collapse menu-dropdown mega-dropdown-menu" id="sales">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="" class="nav-link">Sales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">Sales Returns</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            @endcan

            @can('expenses')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#expenses" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="expenses">
                        <i class="ri-money-dollar-circle-fill"></i> <span data-key="t-base-ui">Expenses</span>
                    </a>
                    <div class="collapse menu-dropdown mega-dropdown-menu" id="expenses">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="" class="nav-link">Expenses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">Expenses Category</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            @endcan

            @can('peoples')
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs(['users*', 'customer*', 'supplier*']) ? 'collapsed active' : '' }}"
                        href="#peoples" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="peoples">
                        <i class="ri-user-2-fill"></i> <span data-key="t-base-ui">Peoples</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs(['users*', 'customer*', 'supplier*']) ? 'show' : '' }}"
                        id="peoples">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="" class="nav-link">Customers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">Suppliers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}"
                                            class="nav-link {{ request()->routeIs('users*') ? 'active' : '' }}">Users</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            @endcan

            @can('settings')
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs(['roles*']) ? 'collapsed active' : '' }}"
                        href="#settings" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="settings">
                        <i class="ri-settings-3-fill"></i> <span data-key="t-base-ui">Settings</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs(['roles*']) ? 'show' : '' }}" id="settings">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="" class="nav-link">Global Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}"
                                            class="nav-link {{ request()->routeIs('roles*') ? 'active' : '' }}">Role</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            @endcan


        </ul>
    </div>
    <!-- Sidebar -->
</div>
