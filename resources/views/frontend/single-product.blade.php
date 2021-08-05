@extends('frontend.master.app')
@section('title', 'Product Detail')
@push('css')

@endpush

@section('main-content')
<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="{{ route('index') }}">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="{{ route('product.detail', $product->slug) }}">Shop Details</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		<!-- Shop Single -->
		<section class="shop single section">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="row">
									<div class="col-lg-6 col-12">
										<!-- Product Slider -->
										<div class="product-gallery">
											<!-- Images slider -->
											<div class="flexslider-thumbnails">
												<ul class="slides">
                                                @foreach ($product->images as $image)
                                                <li data-thumb="/images/products/{{ $image->image }}" rel="adjustX:10, adjustY:">
                                                    <img src="/images/products/{{ $image->image }}" alt="">
                                                </li>
                                                @endforeach

												</ul>
											</div>
											<!-- End Images slider -->
										</div>
										<!-- End Product slider -->
									</div>

									<div class="col-lg-6 col-12">
										<div class="product-des">
											<!-- Description -->
											<div class="short">
												<h4>{{ $product->title }}</h4>
												<div class="rating-main">
													@php
														$rated = ceil( $product->getReviews->avg('rate') )
													@endphp
													<ul class="rating">
													@for ($i=1; $i <= 5; $i++)
														@if ($rated >= $i)
														<li><i class="fa fa-star"></i></li>
														@else
														<li><i class="fa fa-star-half-o"></i></li>
														@endif				
													@endfor

													</ul>
													<a href="#" class="total-review">({{ $product->getReviews->count() }}) Review</a>
												</div>
												<p class="price"><span class="discount">${{ $product->price }}</span><s>$00.00</s> </p>
												<div class="description">{!! $product->summary !!}</div>
											</div>
											<!--/ End Description -->

											<!-- Color -->
											{{--  <div class="color">
												<h4>Available Options <span>Color</span></h4>
												<ul>
													<li><a href="#" class="one"><i class="ti-check"></i></a></li>
													<li><a href="#" class="two"><i class="ti-check"></i></a></li>
													<li><a href="#" class="three"><i class="ti-check"></i></a></li>
													<li><a href="#" class="four"><i class="ti-check"></i></a></li>
												</ul>
											</div>
											<!--/ End Color -->  --}}

											<!-- Size -->
											<div class="size">
												<h4>Size</h4>
                                                <select name="size" class="one">
                                                    <option selected="selected" value="S">s</option>
                                                    @foreach(explode(',', $product->size) as $key => $size)
                                                    <option value="{{ $size }}">{{ $size }}</option>
                                                    @endforeach
                                                </select>
											</div>
											<!--/ End Size -->

											<!-- Product Buy -->
											<div class="product-buy">
                                                <form action="{{ route('single-add-to-cart') }}" method="post">
                                                    @csrf
												<div class="quantity">
													<h6>Quantity :</h6>
													<!-- Input Order -->
													<div class="input-group">
														<div class="button minus">
															<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
																<i class="ti-minus"></i>
															</button>
														</div>
                                                        <input type="hidden" name="slug" value="{{ $product->slug }}">
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
                                                    <button type="submit" class="btn">Add to cart</button>
													<a href="{{ route('add-to-wishlist', $product->slug) }}" class="btn min"><i class="ti-heart"></i></a>
												</div>
                                            </form>
												<p class="cat">Category : <a href="{{ route('product-categories', $product->category->slug) }}">{{ $product->category->title }} </a>	</p>

												<p class="availability">Availability : {{ $product->stock }} Products In Stock</p>
											</div>
											<!--/ End Product Buy -->
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-12">
										<div class="product-info">
											<div class="nav-main">
												<!-- Tab Nav -->
												<ul class="nav nav-tabs" id="myTab" role="tablist">
													<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a></li>
													<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a></li>
												</ul>
												<!--/ End Tab Nav -->
											</div>

											<div class="tab-content" id="myTabContent">
												<!-- Description Tab -->
												<div class="tab-pane fade show active" id="description" role="tabpanel">
													<div class="tab-single">
														<div class="row">
															<div class="col-12">
																<div class="single-des">
                                                                    {!! $product->description !!}
																</div>

															</div>
														</div>
													</div>
												</div>
												<!--/ End Description Tab -->

												<!-- Reviews Tab -->
												<div class="tab-pane fade" id="reviews" role="tabpanel">
													<div class="tab-single review-panel">
														<div class="row">
															<div class="col-12">

																<div class="ratting-main">
																	<div class="avg-ratting">
																		<h4> {{ ceil( $product->getReviews->avg('rate') ) }}  <span>(Overall)</span></h4>
																		<span>Based on {{ $product->getReviews->count() }} Comments</span>
																	</div>
																	
																@foreach ( $product->getReviews as  $data )	
																
																	<!-- Single Rating -->
																	<div class="single-rating">
																	
																		<div class="rating-author">
																			<img src="/frontend/images/comments1.jpg" alt="#">
																		</div>

																		<div class="rating-des">
																			<h6> {{$data->user_info['name']}} </h6>
																			<div class="ratings">
																				<ul class="rating">
																					@for ($i=1;  $i<=5; $i++)
																					@if ( $data->rate >= $i  )
																					<li> <i class="fa fa-star"> </i> </li>
																					@else
																					<li><i class="fa fa-star-o"></i></li>
																					@endif
																					@endfor


																				</ul>
																				<div class="rate-count">(<span>{{$data->rate}}</span>)</div>
																			</div>
																			<p> {{ $data->review }} </p>
																		</div>
																	</div>
																	<!--/ End Single Rating -->
																@endforeach

																</div>

																<!-- Review -->	
																<div class="comment-review">
					<div class="add-review">
						<h5>Add A Review</h5>
						<p>Your email address will not be published. Required fields are marked</p>
					</div>
					<h4>Your Rating <span class="text-danger">*</span></h4>
					<div class="review-inner">
							<!-- Form -->
				@auth
				<form class="form" method="post" action="{{route('review.store',$product->slug)}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="rating_box">
                                  <div class="star-rating">
                                    <div class="star-rating__wrap">
									  <input class="star-rating__input" id="star-rating-1" type="radio" name="rate" value="1">
									  <label class="star-rating__ico fa fa-star-o" for="star-rating-1" title="1 out of 5 stars"></label>
                                     
									  <input class="star-rating__input" id="star-rating-2" type="radio" name="rate" value="2">
                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-2" title="2 out of 5 stars"></label>
                                      
									  <input class="star-rating__input" id="star-rating-3" type="radio" name="rate" value="3">
                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-3" title="3 out of 5 stars"></label>
                                     
                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-4" title="4 out of 5 stars"></label>
									  <input class="star-rating__input" id="star-rating-4" type="radio" name="rate" value="4">
                                     
                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-5" title="5 out of 5 stars"></label>
									  <input class="star-rating__input" id="star-rating-5" type="radio" name="rate" value="5">
                                     
									  

									  @error('rate')
										<span class="text-danger">{{$message}}</span>
									  @enderror
                                    </div>
                                  </div>
                            </div>
                        </div>
						<div class="col-lg-12 col-12">
							<div class="form-group">
								<label>Write a review</label>
								<textarea name="review" rows="6" placeholder="" ></textarea>
							</div>
							<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
							<input type="hidden" name="product_id" value="{{ $product->id }}">
						</div>
						<div class="col-lg-12 col-12">
							<div class="form-group button5">	
								<button type="submit" class="btn">Submit</button>
							</div>
						</div>
					</div>
				</form>
				@else 
				<p class="text-center p-5">
					You need to <a href="{{route('login')}}" style="color:rgb(54, 54, 204)">Login</a> OR <a style="color:blue" href="{{route('register')}}">Register</a>
				</p>
				<!--/ End Form -->
				@endauth
					</div>
				</div>															
																<!--/ End Review -->
															</div>
														</div>
													</div>

												</div>
												<!--/ End Reviews Tab -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
		</section>
		<!--/ End Shop Single -->

		<!-- Start Most Popular -->
	<div class="product-area most-popular related-product section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Related Products</h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
						<!-- Start Single Product -->
                        @foreach ($categoryProduct as $key => $cProduct )
						<div class="single-product">
							<div class="product-img">
								<a href="{{ route('product.detail', $cProduct->slug) }}">
									<img class="default-img" src="/images/products/features/{{ $cProduct->photo }}" alt="#">
									<img class="hover-img" src="/images/products/features/{{ $cProduct->photo }}" alt="#">
									<span class="out-of-stock">{{ $cProduct->condition }}</span>
								</a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal-{{ $cProduct->slug }}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3><a href="product-details.html">Black Sunglass For Women</a></h3>
								<div class="product-price">
									<span class="old">${00.00}</span>
									<span>${{ $cProduct->price }}</span>
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

	<!-- Modal -->
    @foreach ($categoryProduct as $key => $cProduct )

    <div class="modal fade" id="exampleModal-{{ $cProduct->slug }}" tabindex="-1" role="dialog">
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
                                        @foreach($cProduct->images as $key => $image)
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
                                    <h2>{{ $cProduct->title }}</h2>
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
                                    <h3>${{ $cProduct->price }}</h3>
                                    <div class="quickview-peragraph">
                                        {{ $cProduct->summary }}
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select name="size" class="one">
                                                    <option selected="selected" value="S">s</option>
                                                    @foreach(explode(',', $product->size) as $key => $size)
                                                    <option value="{{ $size }}">{{ $size }}</option>
                                                    @endforeach
                                                </select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
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
    <!-- Modal end -->
    @endforeach
@endsection

@push('js')
 
@endpush
