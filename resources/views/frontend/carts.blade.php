@extends('frontend.master.app')

@section('title', 'Shopping Carts')

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
                        <li><a href="{{ route('index') }}"> Home <i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th>
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>

						<tbody>
                            <form action="{{ route('update-carts') }}" method="post">
                                @csrf
                            @forelse($carts as $key => $cart)
							<tr>
								<td class="image" data-title="No"><img src="/images/products/features/{{ $cart->product->photo }}" alt="#"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="#">{{ $cart->product->title }}</a></p>
									<p class="product-des"> {{ Str::limit($cart->product->summary, 35, '.....') }} </p>
								</td>
								<td class="price" data-title="Price"><span>${{ $cart->price }} </span></td>
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[{{ $key }}]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="quant[{{ $key }}]" class="input-number"  data-min="1" data-max="100" value="{{ $cart->quantity }}">
                                        <input type="hidden" name="qty_id[]" value="{{ $cart->id }}">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[{{ $key }}]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span>${{ $cart->amount }}</span></td>
								<td class="action" data-title="Remove"><a href="{{ route('delete-cart', $cart->id) }}"><i class="ti-trash remove-icon"></i></a></td>
							</tr>
                            @empty
                            <h3 style="color:red;"> Cart is not found....</h3>
                            @endforelse
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="float-right"><button class="btn float-right" type="submit">Update</button></td>
                            </tr>
                            </form>
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>


			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">

										<form action="{{ route('store.coupon') }}" method="post">
                                            @csrf
											<input name="code" placeholder="Enter Your Coupon">
											<button class="btn">Apply</button>
										</form>

                                        <h4> {{ Session::get('coupon')['value'] }} </h4>

									</div>
									{{--  <div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
									</div>  --}}
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span>${{ Helper::totalCartPrice() }}</span></li>
                                    {{--
                                        <li> Shipping
                                            @if(Helper::shippings())
                                            <div>
                                                <select name="shipping" class="nice-select">
                                                    <option value="">Select</option>
                                                    @foreach(Helper::shippings() as $shipping)
                                                    <option value="{{$shipping->id}}" class="shippingOption" data-price="{{$shipping->price}}">{{$shipping->type}}: ${{$shipping->price}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @else
                                            <span>Free</span>
                                            @endif
                                        </li>   --}}

										@if( session()->has('coupon') )
                                            <li>You Save<span>${{ Session::get('coupon')['value']  }}</span></li>
                                            <li class="last">You Pay<span>${{ (Helper::totalCartPrice()-Session::get('coupon')['value'])  }}</span></li>
                                        @else
                                            <li class="last">You Pay<span>${{ Helper::totalCartPrice() }}</span></li>
                                        @endif

									</ul>
									<div class="button5">
										<a href="{{ route('checkout') }}" class="btn">Checkout</a>
										<a href="{{ route('index') }}" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->



@endsection

@push('js')
@endpush
