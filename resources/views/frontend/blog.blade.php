@extends('frontend.master.app')

@section('title', 'Blogs')

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
							<li class="active"><a href="">Blog Grid</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Start Blog Grid -->
	<div class="blog-single shop-blog grid section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="row">

                        
                        
                        @forelse ($posts as $post)
                        
						<div class="col-lg-4 col-md-6 col-12">
							<!-- Start Single Blog  -->
							<div class="shop-single-blog">
								<img src="/images/blogs/{{ $post->photo }}" alt="#">
								<div class="content">
									<p class="date"> {{ $post->created_at->format('d M, Y, D') }}</p>
									<a href="{{ route('blog.detail', $post->slug) }}" class="title">{{$post->title}}</a>
									<a href="{{ route('blog.detail', $post->slug) }}" class="more-btn">Continue Reading</a>
								</div>
							</div>
							<!-- End Single Blog  -->
						</div>
                            
                        @empty
                            <h3 style="color:red">There are no post</h3>                            
                        @endforelse
                        

						<div class="col-12">
							<!-- Pagination -->
							<div class="pagination center">
								{{--  <ul class="pagination-list">
									<li><a href="{{ $posts->previousPageUrl() }}"><i class="ti-arrow-left"></i></a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="{{$posts->nextPageUrl()}}"><i class="ti-arrow-right"></i></a></li>

								</ul>  --}}

    @if ($posts->hasPages())
	 <ul class="pagination-list">
        {{-- Previous Page Link --}}
        @if ($posts->onFirstPage())
            <li class="disabled"><i class="ti-arrow-left"></i></li>
        @else
			<li><a href="{{ $posts->previousPageUrl() }}"><i class="ti-arrow-left"></i></a></li>
            
        @endif

        @if($posts->currentPage() > 3)
            <li class="hidden-xs"><a href="{{ $posts->url(1) }}">1</a></li>
        @endif
        @if($posts->currentPage() > 4)
            <li><span>...</span></li>
        @endif
        @foreach(range(1, $posts->lastPage()) as $i)
            @if($i >= $posts->currentPage() - 2 && $i <= $posts->currentPage() + 2)
                @if ($i == $posts->currentPage())
                    <li class="active"><span>{{ $i }}</span></li>
                @else
                    <li><a href="{{ $posts->url($i) }}">{{ $i }}</a></li>
                @endif
            @endif
        @endforeach
        @if($posts->currentPage() < $posts->lastPage() - 3)
            <li><span>...</span></li>
        @endif
        @if($posts->currentPage() < $posts->lastPage() - 2)
            <li class="hidden-xs"><a href="{{ $posts->url($posts->lastPage()) }}">{{ $posts->lastPage() }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($posts->hasMorePages())
            <li><a href="{{$posts->nextPageUrl()}}"> <i 
class="ti-arrow-right"></i> </a></li>
        @else
            <li class="disabled"><i 
class="ti-arrow-right"></i></li>
        @endif
    </ul>
@endif


							</div>
							<!--/ End Pagination -->
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Blog Grid -->
			
@endsection

@push('js')
@endpush