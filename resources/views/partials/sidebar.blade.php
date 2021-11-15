<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{ url('assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                <li class="sidebar-item">
                    <a href="{{ route('dashboard.index') }}" class='sidebar-link'>
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('users.index') }}" class='sidebar-link'>
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('groups.index') }}" class='sidebar-link'>
                        <i class="fas fa-th-large"></i>
                        <span>Groups</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('brands.index') }}" class='sidebar-link'>
                        <i class="fas fa-tags"></i>
                        <span>Brands</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('categories.index') }}" class='sidebar-link'>
                        <i class="far fa-file"></i>
                        <span>Categories</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('stores.index') }}" class='sidebar-link'>
                        <i class="fas fa-store"></i>
                        <span>Stores</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('attributes.index') }}" class='sidebar-link'>
                        <i class="far fa-file"></i>
                        <span>Attributes</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('products.index') }}" class='sidebar-link'>
                        <i class="fas fa-box"></i>
                        <span>Products</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('orders.index') }}" class='sidebar-link'>
                        <i class="fas fa-dollar-sign"></i>
                        <span>Orders</span>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a href="/company" class='sidebar-link'>
                        <i class="fas fa-building"></i>
                        <span>Company</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="/users/profile" class='sidebar-link'>
                        <i class="fas fa-user-circle"></i>
                        <span>Profile</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="/users/create" class='sidebar-link'>
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>