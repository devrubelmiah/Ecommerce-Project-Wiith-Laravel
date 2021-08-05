<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
                            <li><i class="ti-email"></i> support@shophub.com </li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <li><i class="ti-location-pin"></i>Track location..</li>
                            @auth('admin')
                            <li><i class="ti-alarm-clock"></i> <a href="{{ route('admin.dashboard') }}" target="_blank"> Admin Dashboard </a></li>
                            <li><i class="ti-alarm-clock"></i> <a href="{{ route('admin.logout') }}"> Logout </a></li>

                            @else
                            @auth('web')
                            <li><i class="ti-alarm-clock"></i> <a href="{{ route('user.dashboard') }}" target="_blank"> Dashboard </a></li>
                            <li><i class="ti-alarm-clock"></i> <a href="{{ route('user.logout') }}"> Logout </a></li>
                            @else
                            <li><i class="ti-power-off"></i> <a href="{{ route('login') }}">Login</a> / <a href="{{ route('register') }}"> Register</a> </li>
                            @endauth
                            @endauth
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ route('index') }}"><img src="/frontend/images/logo.png" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        {{--  <div class="search-bar">
                            <select>
                                <option selected="selected">All Category</option>
                                <option>watch</option>
                                <option>mobile</option>
                                <option>kid’s item</option>
                            </select>
                            <form>
                                <input name="search" placeholder="Search Products Here....." type="search">
                                <button class="btnn"><i class="ti-search"></i></button>
                            </form>
                        </div>  --}}
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        {{--  <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                        </div>  --}}

                        <div class="sinlge-bar shopping">
                            <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count"> {{ Helper::cartCount() }} </span></a>
                            @auth
                                
                            
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>{{ Helper::cartCount() }} Items</span>
                                    <a href="{{ route('carts') }}">View Cart</a>
                                </div>
                                <ul class="shopping-list">
                                @foreach ( Helper::getAllProductFromCart() as $cart)
                                    <li>
                                        <a href="{{ route('delete-cart', $cart->id) }}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="/images/products/features/{{$cart->product->photo}}" alt="#"></a>
                                        <h4><a href="#"> {{ $cart->product->title }} </a></h4>
                                        <p class="quantity">1x - <span class="amount">${{ $cart->price }}</span></p>
                                    </li>
                                @endforeach

                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Total</span>
                                        <span class="total-amount">$ {{ Helper::totalCartPrice() }} </span>
                                    </div>
                                    <a href="{{ route('checkout') }}" class="btn animate">Checkout</a>
                                </div>
                            </div>
                            <!--/ End Shopping Item -->
                            @endauth
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('index') }}">Home</a>
                                            </li>
                                            <li class="{{ Request::is('product-grids') ? 'active' : '' }}"><a href="{{ route('product.grids') }}">Product</a></li>
                                            <li><a href="">Shop<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="{{route('carts')}}">Cart</a></li>
                                                    <li><a href="{{route('checkout')}}">Checkout</a></li>
                                                </ul>
                                            </li>
                                            {{--  <li><a href="#">Pages<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="about-us.html">About Us</a></li>
                                                    <li><a href="login.html">Login</a></li>
                                                    <li><a href="register.html">Register</a></li>
                                                    <li><a href="mail-success.html">Mail Success</a></li>
                                                    <li><a href="404.html">404</a></li>
                                                </ul>
                                            </li>  --}}
                                            <li class="{{ Request::is('blogs') ? 'active' : '' }}"><a href="{{route('blog')}}">Blog</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
