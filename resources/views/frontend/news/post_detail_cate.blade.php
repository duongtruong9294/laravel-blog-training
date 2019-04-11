@extends('frontend.master')
@section('content')
<section class="section blog-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12">
				<div class="blog-posts">
					@foreach($news_by_cate as $new)
					<div id="{{'news'.$new->id}}" class="single-post">
						<div class="image-wrapper"><img src="{{ asset('images/news/'.$new->image) }}" style="width: 730; height: 438px;" alt="Blog Image"></div>

						<div class="icons">
							<div class="left-area">
								<a class="btn caegory-btn" href="{{ route('postbycate',$new->categories->id) }}"><b>{{ $new->categories->name }}</b></a>
							</div>
							<ul class="right-area social-icons">
								<li><a href="#"><i class="ion-android-share-alt"></i>Share</a></li>
								<li><a href="#"><i class="ion-android-favorite-outline"></i>03</a></li>
								<li><a href="#"><i class="ion-android-textsms"></i>06</a></li>
							</ul>
						</div>
						<p class="date"><em>Monday, October 13, 2017</em></p>
						<h3 class="title"><a href="#"><b class="light-color" id="{{'news-name'.$new->id}}">{{ $new->username }}</b></a></h3>
						<p>{{ $new->description }}</p>
						<a class="btn read-more-btn" href="{{ route('news.show', $new->id) }}"><b>READ MORE</b></a>
					</div><!-- single-post -->
					@endforeach
					<div>
						{{ $news_by_cate->links() }}
					</div>
					</div><!-- blog-posts -->
				</div><!-- col-lg-4 -->
				@include('frontend.layouts.leftslide')
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->
@endsection
