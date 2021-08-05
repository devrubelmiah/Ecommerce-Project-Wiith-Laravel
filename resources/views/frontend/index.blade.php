@extends('frontend.master.app')

@section('title', 'Home')

@push('css')
<style> 
.single-product .product-img a img {
    width: 100%;
    height: 300px !important;
}    
</style>
@endpush

@section('main-content')
<!-- Slider Area -->
<section class="hero-area4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="home-slider-4">
                    @forelse ($banners as $key => $banner)
                    <div class="big-content" style="background-image: url('/images/sliders/{{ $banner->photo }}');">
                        <div class="inner">
                            <h4 class="title">{!! $banner->title !!}</h4>
                            <div class="des">{!! $banner->description !!}</div>
                            <div class="button">
                                <a href="{{ route('product.grids') }}" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h2>Dont Found Slider. Please Add slider.</h2>
                    @endforelse


                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Slider Area -->

<!--Start Small Banner-->
	<section class="small-banner section">
		<div class="container">
			<div class="row">
				<!-- Single Banner  -->
                @forelse ($categories as $key => $category )

				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-banner">
						<img src="/images/categories/{{ $category->photo }}" alt="#">
						<div class="content">
							{{--  <p>Mans Collectons</p>  --}}
							<h3>{{ $category->title }}</h3>
							<a href="{{ route('product-categories', $category->slug) }}">Discover Now</a>
						</div>
					</div>
				</div>

                @empty
                <h2 class="text-center">Dont Have Category. Please Add Category</h2>
                @endforelse
				<!-- /End Single Banner  -->
			</div>
		</div>
	</section>
	<!-- End Small Banner -->

<!-- Start Product Area -->
<div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Trending Item</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="nav-main">
                            <!-- Tab Nav -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @forelse ($productCategories as $key => $category )
                            <li class="nav-item"><a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="tab" href="#{{ $category->slug }}" role="tab">{{ $category->title }}</a> </li>
                            @empty
                            <h2 class="text-center">Dont Have Category. Please Add Category</h2>
                            @endforelse

                            </ul>
                            <!--/ End Tab Nav -->
                        </div>

                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
                            @foreach($productCategories as $key => $pCategory)
                            <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="{{ $pCategory->slug }}" role="tabpanel">
                                <div class="tab-single">
                                    <div class="row">
                                        @foreach($pCategory->products as $key => $product)
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="{{ route('product.detail',$product->slug) }}">
                                                        <img class="default-img img-fluid" width="300px" height="400px" src="/images/products/features/{{ $product->photo }}" alt="#">
                                                        <img class="hover-img" src="/images/products/features/{{ $product->photo }}" alt="#">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            {{--  <a data-toggle="modal" data-target="#catProduct-{{ $product->slug }}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>  --}}
                                                            {{--  <a title="Wishlist" href="{{ route('add-to-wishlist', $product->slug) }}"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>  --}}
                                                            {{--  <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>  --}}
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="{{ route('add-to-cart', $product->slug) }}">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="{{ route('product.detail',$product->slug) }}">{{ $product->title }}</a></h3>
                                                    <div class="product-price">
                                                        <span>${{ $product->price }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <!--/ End Single Tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- End Product Area -->

<!-- Start Hot Item -->
<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Hot Item</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    <!-- Start Single Product -->
                    @foreach($hotProducts as $key => $hProduct)
                    <div class="single-product">
                        <div class="product-img">
                            <a href="{{ route('product.detail', $hProduct->slug) }}">
                                <img class="default-img" src="/images/products/features/{{ $hProduct->photo }}" alt="#">
                                <img class="hover-img" src="/images/products/features/{{ $hProduct->photo }}" alt="#">
                                <span class="out-of-stock">{{ $hProduct->condition }}</span>
                            </a>
                            <div class="button-head">
                                <div class="product-action">
                                    {{--  <a data-toggle="modal" data-target="#hProduct-{{ $hProduct->slug }}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>  --}}
                                    {{--  <a title="Wishlist" href="{{ route('add-to-wishlist', $hProduct->slug) }}"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>  --}}
                                    {{--  <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>  --}}
                                </div>
                                <div class="product-action-2">
                                    <a title="Add to cart" href="{{ route('add-to-cart', $hProduct->slug) }}">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('product.detail', $product->slug) }}">{{ $hProduct->title }}</a></h3>
                            <div class="product-price">
                                <span class="old">${{ $hProduct->price }}</span>
                                <span>${{ $hProduct->price }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Single Product -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Most Popular Area -->

<!-- Start Shop Latest List  -->
<section class="shop-home-list section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="shop-section-title">
                    <h1>Latest Items</h1>
                </div>
            </div>
        </div>
        <div class="row">

            <!-- Start Single List  -->
            @foreach($latestProducts as $key => $lProduct)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="/images/products/features/{{ $lProduct->photo }}" alt="#">
                                <a href="{{ route('product.detail', $lProduct->slug) }}" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h4 class="title"><a href="{{ route('product.detail', $lProduct->slug) }}">{{$lProduct->title}}</a></h4>
                                <p class="price with-discount">${{$lProduct->price}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- End Single List  -->

        </div>
    </div>
</section>
<!-- End Shop Home List  -->

<!-- Start Shop Blog  -->
<section class="shop-blog section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>From Our Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($posts as $key => $post )

            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Blog  -->
                <div class="shop-single-blog">
                    <img src="/images/blogs/{{ $post->photo }}" alt="#">
                    <div class="content">
                        <p class="date"> {{ $post->created_at->format('d M, Y, D') }}</p>
                        <a href="{{ route('blog.detail', $post->slug) }}" class="title">{{ Str::limit($post->title, 25, '.....') }}.</a>
                        <a href="{{ route('blog.detail', $post->slug) }}" class="more-btn">Continue Reading</a>
                    </div>
                </div>
                <!-- End Single Blog  -->
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- End Shop Blog  -->

<!-- Start Shop Services Area -->
<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Free shiping</h4>
                    <p>Orders over $100</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Free Return</h4>
                    <p>Within 30 days returns</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Sucure Payment</h4>
                    <p>100% secure payment</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Best Peice</h4>
                    <p>Guaranteed price</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Services Area -->
@endsection