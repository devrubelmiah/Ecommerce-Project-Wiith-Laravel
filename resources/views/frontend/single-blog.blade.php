@extends('frontend.master.app')
@section('title', 'Blog Detail')

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
								<li class="active"><a href="">Blog Single</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
			
		<!-- Start Blog Single -->
		<section class="blog-single section">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 col-12">
						<div class="blog-single-main">
							<div class="row">
								<div class="col-12">
									<div class="image">
										<img src="/images/blogs/{{$post->photo}}" alt="#">
									</div>
									<div class="blog-detail">
										<h2 class="blog-title"> {{ $post->title }} </h2>
										<div class="blog-meta">
											<span class="author"><a href=""><i class="fa fa-user"></i>By {{ $post->user->name }}</a><a href="#"><i class="fa fa-calendar"></i> {{ date('F j, Y', strtotime($post->created_at)) }}</a><a href="#"><i class="fa fa-comments"></i>Comment (15)</a></span>
										</div>
										<div class="content">

                                         @if($post->quote)
                                        <blockquote> <i class="fa fa-quote-left"></i> {!! ($post->quote) !!}</blockquote>
                                        @endif

											{!! $post->description !!}
										</div>
									</div>
									<div class="share-social">
										<div class="row">
											<div class="col-12">
                                            <div class="content-tags">
													<h4>Categories: </h4>
													<ul class="tag-inner">
                                                    @foreach ($post->Categories as $category )
														<li><a href="#">{{$category->title}}</a></li>
                                                    @endforeach
													</ul>
												</div>
                                            
												<div class="content-tags">
													<h4>Tags: </h4>
													<ul class="tag-inner">
                                                    @foreach ($post->tags as $tag )
														<li><a href="#">{{$tag->title}}</a></li>
                                                    @endforeach
													</ul>
												</div>

											</div>
										</div>
									</div>
								</div>

								<div class="col-12">
									<div class="comments">
										<h3 class="comment-title">Comments ({{ $post->comments()->count() }})</h3>

										<!-- Single Comment -->
										@forelse ($post->comments as $key => $comment)

										<div class="single-comment">
										@if ($comment->user->photo)
											<img src="/images/users/{{$comment->user->photo}}" alt="">
										@else
											<img src="/frontend/images/comment1.jpg" alt="#">
										@endif
											<div class="content">
												<p> {{ $comment->comment }} </p>
												<div class="button">
													<i class="fa fa-reply" aria-hidden="true"></i>Reply <br/>
													<p> {{ $comment->replied_comment }} </p>
												</div>
											</div>
										</div>
										<!-- End Single Comment -->
										@empty
											<p style="color:red">There are no comments.</p>
										@endforelse

									</div>									
								</div>											
								<div class="col-12">
									<div class="reply">
										<div class="reply-head">
											<h2 class="reply-title">Leave a Comment</h2>
											<!-- Comment Form -->

											@auth
											<form class="form" action="{{ route('post.comment.store', $post->id) }}" method="post">
												@csrf
												<div class="row">
													{{--  <div class="col-lg-6 col-md-6 col-12">
														<div class="form-group">
															<label>Your Name<span>*</span></label>
															<input type="text" name="name" placeholder="" required="required">
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-12">
														<div class="form-group">
															<label>Your Email<span>*</span></label>
															<input type="email" name="email" placeholder="" required="required">
														</div>
													</div>  --}}

													<div class="col-12">
														<div class="form-group">
															<label>Your Message<span>*</span></label>
															<textarea name="comment" placeholder=""></textarea>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group button">
															<button type="submit" class="btn">Post comment</button>
														</div>
													</div>
												</div>
											</form>
											<!-- End Comment Form -->
											@else
											<p class="text-center p-5"> You need to <a href="{{route('login')}}" style="color:rgb(54, 54, 204)">Login</a> OR <a style="color:blue" href="{{route('register')}}">Register</a> for comment. </p>
											@endauth
										</div>
									</div>			
								</div>			
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Blog Single -->
			
@endsection

@push('js')
@endpush
