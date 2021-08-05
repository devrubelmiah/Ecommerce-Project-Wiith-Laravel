@extends('frontend.master.app')

@section('title', 'Product List')

@push('css')
<style>
.single-product {
    margin-top: 0px;
}
.single-product .product-img a img {
    width: 100%;
    height: 300px !important;
}    
</style>
@endpush

@section('main-content')
<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="{{route('index')}}">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="">Shop Grid</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		
		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Categories</h3>
									<ul class="categor-list">
										@foreach ($categories as $category)
                                        <li><a href="{{ route('product-categories', $category->slug) }}">{{ $category->title }}</a></li>
                                            
                                        @endforeach
										
									</ul>
								</div>
								<!--/ End Single Widget -->							
							
						</div>
					</div>

		<div class="col-lg-9 col-md-8 col-12">
            <div class="row">
				@foreach($products as $key => $product)
				<div class="col-lg-4 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-img">
                            <a href="{{ route('product.detail', $product->slug) }}">
                                <img class="default-img" src="/images/products/features/{{ $product->photo }}" alt="#">
                                <img class="hover-img" src="/images/products/features/{{ $product->photo }}" alt="#">
                                <span class="out-of-stock">{{ $product->condition }}</span>
                            </a>
                            <div class="button-head">
                                <div class="product-action">
                                    <a data-toggle="modal" data-target="#product-{{ $product->slug }}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                    {{--  <a title="Wishlist" href="{{ route('add-to-wishlist', $product->slug) }}"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>  --}}
                                    {{--  <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>  --}}
                                </div>
                                <div class="product-action-2">
                                    <a title="Add to cart" href="{{ route('add-to-cart', $product->slug) }}">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('product.detail', $product->slug) }}">{{ $product->title }}</a></h3>
                            <div class="product-price">
                                <span class="old">${{ $product->price }}</span>
                                <span>${{ $product->price }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
					</div>
                    @endforeach
						</div>
                            <div class="pagination center">
                                @if ($products->hasPages())
                            <ul class="pagination-list">
                                {{-- Previous Page Link --}}
                                @if ($products->onFirstPage())
                                    <li class="disabled"><i class="ti-arrow-left"></i></li>
                                @else
                                    <li><a href="{{ $products->previousPageUrl() }}"><i class="ti-arrow-left"></i></a></li>
                                    
                                @endif

                                @if($products->currentPage() > 3)
                                    <li class="hidden-xs"><a href="{{ $products->url(1) }}">1</a></li>
                                @endif
                                @if($products->currentPage() > 4)
                                    <li><span>...</span></li>
                                @endif
                                @foreach(range(1, $products->lastPage()) as $i)
                                    @if($i >= $products->currentPage() - 2 && $i <= $products->currentPage() + 2)
                                        @if ($i == $products->currentPage())
                                            <li class="active"><span>{{ $i }}</span></li>
                                        @else
                                            <li><a href="{{ $products->url($i) }}">{{ $i }}</a></li>
                                        @endif
                                    @endif
                                @endforeach
                                @if($products->currentPage() < $products->lastPage() - 3)
                                    <li><span>...</span></li>
                                @endif
                                @if($products->currentPage() < $products->lastPage() - 2)
                                    <li class="hidden-xs"><a href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a></li>
                                @endif

                                {{-- Next Page Link --}}
                                @if ($products->hasMorePages())
                                    <li><a href="{{$products->nextPageUrl()}}"> <i 
                        class="ti-arrow-right"></i> </a></li>
                                @else
                                    <li class="disabled"><i 
                        class="ti-arrow-right"></i></li>
                                @endif
                            </ul>
                        @endif
                        </div>
					</div>
				</div>
			</div>
        </div>
		</section>
		<!--/ End Product Style 1  -->	

<!--Single Product Modal -->
@foreach($products as $key => $product)
<div class="modal fade" id="product-{{ $product->slug }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <!-- Product Slider -->
                                <div class="product-gallery">
                                    <div class="quickview-slider-active">

                                        @foreach($product->images as $key => $image)
                                        <div class="single-slider">
                                            <img src="/images/products/{{ $image->image }}" alt="#">
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-content">
                                <h2>{{ $product->title }}</h2>
                                <div class="quickview-ratting-review">
                                    <div class="quickview-ratting-wrap">
                                        <div class="quickview-ratting">
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"> (1 customer review)</a>
                                    </div>
                                    <div class="quickview-stock">
                                        <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                    </div>
                                </div>
                                <h3>${{ $product->price }}</h3>
                                <div class="quickview-peragraph">
                                    {{ $product->summary }}
                                </div>
                                <div class="size">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Size</h5>
                                            <select name="size">
                                                <option selected="selected" value="S">s</option>
                                                @foreach(explode(',', $product->size) as $key => $size)
                                                <option value="{{ $size }}">{{ $size }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{--  <div class="col-lg-6 col-12">
                                            <h5 class="title">Color</h5>
                                            <select>
                                                <option selected="selected">orange</option>
                                                <option>purple</option>
                                                <option>black</option>
                                                <option>pink</option>
                                            </select>
                                        </div>  --}}
                                    </div>
                                </div>
                                <div class="quantity">
                                    <!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </div>
                                <div class="add-to-cart">
                                    <a href="#" class="btn">Add to cart</a>
                                    <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                    <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                                </div>
                                <div class="default-social">
                                    <h4 class="share-now">Share:</h4>
                                    <ul>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endforeach
<!-- Modal end -->
@endsection

@push('js')
@endpush