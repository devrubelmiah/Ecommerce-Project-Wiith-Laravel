<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    @if(Request::is('admin/*'))

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    <!-- Nav Item - Pages Collapse Menu -->

    {{--  //Banner Menu  --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBanner"
            aria-expanded="{{ Request::is('admin/banners*') ? 'true' : 'false' }}" aria-controls="collapseBanner">
            <i class="fas fa-fw fa-cog"></i>
            <span>Banners</span>
        </a>
        <div id="collapseBanner" class="collapse {{ Request::is('admin/banners*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">show Banners:</h6>
                <a class="collapse-item {{ Request::is('admin/banners') ? 'active' : '' }} " href="{{ route('admin.banners.index') }}">All Banners</a>
                <a class="collapse-item {{ Request::is('admin/banners/create') ? 'active' : '' }} " href="{{ route('admin.banners.create') }}">Create Banner</a>
            </div>
        </div>
    </li>

    {{--  //Brand Menu  --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrand"
            aria-expanded="{{ Request::is('admin/brands*') ? 'true' : 'false' }}" aria-controls="collapseBrand">
            <i class="fas fa-fw fa-cog"></i>
            <span>Brands</span>
        </a>
        <div id="collapseBrand" class="collapse {{ Request::is('admin/brands*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">show brands:</h6>
                <a class="collapse-item {{ Request::is('admin/brands') ? 'active' : '' }} " href="{{ route('admin.brands.index') }}">All Brands</a>
                <a class="collapse-item {{ Request::is('admin/brands/create') ? 'active' : '' }} " href="{{ route('admin.brands.create') }}">Create Brand</a>
            </div>
        </div>
    </li>

    {{--  //Category Menu  --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
            aria-expanded="{{ Request::is('admin/categories*') ? 'true' : 'false' }}" aria-controls="collapseCategory">
            <i class="fas fa-fw fa-cog"></i>
            <span>Categories</span>
        </a>
        <div id="collapseCategory" class="collapse {{ Request::is('admin/categories*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">show Categories:</h6>
                <a class="collapse-item {{ Request::is('admin/categories') ? 'active' : '' }} " href="{{ route('admin.categories.index') }}">All Categories</a>
                <a class="collapse-item {{ Request::is('admin/categories/create') ? 'active' : '' }} " href="{{ route('admin.categories.create') }}">Create Category</a>
            </div>
        </div>
    </li>

     {{--  //product Menu  --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
            aria-expanded="{{ Request::is('admin/products*') ? 'true' : 'false' }}" aria-controls="collapseProduct">
            <i class="fas fa-fw fa-cog"></i>
            <span>Products</span>
        </a>
        <div id="collapseProduct" class="collapse {{ Request::is('admin/products*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">show Products:</h6>
                <a class="collapse-item {{ Request::is('admin/products') ? 'active' : '' }} " href="{{ route('admin.products.index') }}">All Products</a>
                <a class="collapse-item {{ Request::is('admin/products/create') ? 'active' : '' }} " href="{{ route('admin.products.create') }}">Create Product</a>
            </div>
        </div>
    </li>

    {{--  //Coupon Menu  --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCoupon"
            aria-expanded="{{ Request::is('admin/coupons*') ? 'true' : 'false' }}" aria-controls="collapseCoupon">
            <i class="fas fa-fw fa-cog"></i>
            <span>Coupons</span>
        </a>
        <div id="collapseCoupon" class="collapse {{ Request::is('admin/coupons*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Show Coupons:</h6>
                <a class="collapse-item {{ Request::is('admin/coupons') ? 'active' : '' }} " href="{{ route('admin.coupons.index') }}">All Coupons</a>
                <a class="collapse-item {{ Request::is('admin/coupons/create') ? 'active' : '' }} " href="{{ route('admin.coupons.create') }}">Create Coupon</a>
            </div>
        </div>
    </li>

    {{--  //Coupon Menu  --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseShippings"
            aria-expanded="{{ Request::is('admin/shippings*') ? 'true' : 'false' }}" aria-controls="collapseCoupon">
            <i class="fas fa-fw fa-cog"></i>
            <span>Shippings</span>
        </a>
        <div id="collapseShippings" class="collapse {{ Request::is('admin/shippings*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Show Shippings:</h6>
                <a class="collapse-item {{ Request::is('admin/shippings') ? 'active' : '' }} " href="{{ route('admin.shippings.index') }}">All Shippings</a>
                <a class="collapse-item {{ Request::is('admin/shippings/create') ? 'active' : '' }} " href="{{ route('admin.shippings.create') }}">Create Shipping</a>
            </div>
        </div>
    </li>

    {{--  //Orders Menu  --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
            aria-expanded="{{ Request::is('admin/orders*') ? 'true' : 'false' }}" aria-controls="collapseOrders">
            <i class="fas fa-fw fa-cog"></i>
            <span>Orders</span>
        </a>
        <div id="collapseOrders" class="collapse {{ Request::is('admin/orders*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#collapseOrders">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Show Orders:</h6>
                <a class="collapse-item {{ Request::is('admin/orders') ? 'active' : '' }} " href="{{ route('admin.orders.index') }}">All Orders</a>
                <a class="collapse-item {{ Request::is('admin/orders/create') ? 'active' : '' }} " href="{{ route('admin.orders.create') }}">Create Orders</a>
            </div>
        </div>
    </li>

     {{--  //Coupon Menu  --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReview"
            aria-expanded="{{ Request::is('admin/reviews*') ? 'true' : 'false' }}" aria-controls="collapseCoupon">
            <i class="fas fa-fw fa-cog"></i>
            <span>Reviews</span>
        </a>
        <div id="collapseReview" class="collapse {{ Request::is('admin/reviews*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Show Reviews:</h6>
                <a class="collapse-item {{ Request::is('admin/reviews') ? 'active' : '' }} " href="{{ route('admin.reviews.index') }}">All Reviews</a>
                <a class="collapse-item {{ Request::is('admin/reviews/create') ? 'active' : '' }} " href="{{ route('admin.reviews.create') }}">Create Reviews</a>
            </div>
        </div>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Blog
    </div>

    {{--//Post  Menu--}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepostPost"
            aria-expanded="{{ Request::is('admin/posts*') ? 'true' : 'false' }}" aria-controls="collapsepostPost">
            <i class="fas fa-fw fa-folder"></i>
            <span>Posts</span>
        </a>
        <div id="collapsepostPost" class="collapse {{ Request::is('admin/posts*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Show Posts:</h6>
                <a class="collapse-item {{ Request::is('admin/posts') ? 'active' : '' }} " href="{{ route('admin.posts.index') }}">All Posts</a>
                <a class="collapse-item {{ Request::is('admin/posts/create') ? 'active' : '' }} " href="{{ route('admin.posts.create') }}">Create Post</a>
            </div>
        </div>
    </li>

    {{--//Comment  Menu--}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepostComment"
            aria-expanded="{{ Request::is('admin/comments*') ? 'true' : 'false' }}" aria-controls="collapsepostPost">
            <i class="fas fa-fw fa-folder"></i>
            <span>Comment</span>
        </a>
        <div id="collapsepostComment" class="collapse {{ Request::is('admin/comments*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Show Comment:</h6>
                <a class="collapse-item {{ Request::is('admin/comments') ? 'active' : '' }} " href="{{ route('admin.comments.index') }}">All Comments</a>
                <a class="collapse-item {{ Request::is('admin/comments/create') ? 'active' : '' }} " href="{{ route('admin.comments.create') }}">Create Comment</a>
            </div>
        </div>
    </li>


{{--//Post Category Menu--}}
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepostcategory"
        aria-expanded="{{ Request::is('admin/post-categories*') ? 'true' : 'false' }}" aria-controls="collapsepostcategory">
        <i class="fas fa-fw fa-folder"></i>
        <span>Category</span>
    </a>
    <div id="collapsepostcategory" class="collapse {{ Request::is('admin/post-categories*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Show Post Category:</h6>
            <a class="collapse-item {{ Request::is('admin/post-categories') ? 'active' : '' }} " href="{{ route('admin.post-categories.index') }}">All Categories</a>
            <a class="collapse-item {{ Request::is('admin/post-categories/create') ? 'active' : '' }} " href="{{ route('admin.post-categories.create') }}">Create Category</a>
        </div>
    </div>
</li>


 {{--  //Post Tag Menu  --}}
 <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepostTag"
        aria-expanded="{{ Request::is('admin/post-tags*') ? 'true' : 'false' }}" aria-controls="collapsepostTag">
        <i class="fas fa-fw fa-folder"></i>
        <span>Tag</span>
    </a>
    <div id="collapsepostTag" class="collapse {{ Request::is('admin/post-tags*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Show Post Tags:</h6>
            <a class="collapse-item {{ Request::is('admin/post-tags') ? 'active' : '' }} " href="{{ route('admin.post-tags.index') }}">All Tags</a>
            <a class="collapse-item {{ Request::is('admin/post-tags/create') ? 'active' : '' }} " href="{{ route('admin.post-tags.create') }}">Create Tag</a>
        </div>
    </div>
</li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card">
        <img class="sidebar-card-illustration mb-2" src="/frontend/img/undraw_rocket.svg" alt="">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div>

    @endif

    @if(Request::is('users/*'))
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('users/dashboard') ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('user.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrand"
            aria-expanded="{{ Request::is('admin/brands*') ? 'true' : 'false' }}" aria-controls="collapseBrand">
            <i class="fas fa-fw fa-cog"></i>
            <span>Brands</span>
        </a>
        <div id="collapseBrand" class="collapse {{ Request::is('admin/brands*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">show brands:</h6>
                <a class="collapse-item {{ Request::is('admin/brands') ? 'active' : '' }} " href="{{ route('admin.brands.index') }}">All Brands</a>
                <a class="collapse-item {{ Request::is('admin/brands/create') ? 'active' : '' }} " href="{{ route('admin.brands.create') }}">Create Brand</a>
            </div>
        </div>
    </li>
 --}}
    @endif
</ul>
