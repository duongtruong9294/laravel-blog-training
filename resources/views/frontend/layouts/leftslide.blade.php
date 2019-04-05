<?php
	use App\User;
	use App\Category;
	use App\News;

	$new_news = News::with('categories')->orderBy('created_at', 'desc')->take(4)->get();
	$categories = Category::all();
 ?>

<div class="col-lg-4 col-md-12">
	<div class="sidebar-area">

		<div class="sidebar-section about-author center-text">
			<div class="author-image"><img src="{{ asset('resource/frontend/images/author-1-200x200.jpg') }}" alt="Autohr Image"></div>

			<ul class="social-icons">
				<li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
				<li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
				<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
				<li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
				<li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
			</ul><!-- right-area -->

			<h4 class="author-name"><b class="light-color">Cristine Smith</b></h4>
			<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
			dolore magnam aliquam quaerat voluptatem.</p>

			<div class="signature-image"><img src="{{ asset('resource/frontend/images/signature-image.png') }}" alt="Signature Image"></div>
			<a class="read-more-link" href="#"><b>READ MORE</b></a>

		</div><!-- sidebar-section about-author -->

		<div class="sidebar-section src-area">

			<form action="post">
				<input class="src-input" type="text" placeholder="Search">
				<button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
			</form>

		</div><!-- sidebar-section src-area -->

		<div class="sidebar-section newsletter-area">
			<h5 class="title"><b>Subscribe to our newsletter</b></h5>
			<form action="post">
				<input class="email-input" type="text" placeholder="Your email here">
				<button class="btn btn-2" type="submit">SUBSCRIBE</button>
			</form>
		</div><!-- sidebar-section newsletter-area -->

		<div class="sidebar-section category-area">
			<h4 class="title"><b class="light-color">Categories</b></h4>
			@foreach($categories as $category)
				<a class="category" href="{{ route('postbycate', $category->id) }}">
					<img src="{{ asset('resource/frontend/images/category-1-400x150.jpg') }}" alt="Category Image">
					<h6 class="name">{{ $category->name }}</h6>
				</a>
			@endforeach
		</div><!-- sidebar-section category-area -->

		<div class="sidebar-section latest-post-area">
			<h4 class="title"><b class="light-color">Latest Posts</b></h4>
			@foreach($new_news as $new)
				<div class="latest-post" href="#">
					<div class="l-post-image"><img src="{{ asset('images/news/'.$new->image) }}" alt="Category Image"></div>
					<div class="post-info">
						<a class="btn category-btn" href="#">{{ $new->categories->name }}</a>
						<h5><a href="#"><b class="light-color">One more night in the clubs</b></a></h5>
						<h6 class="date"><em>Monday, October 13, 2017</em></h6>
					</div>
				</div>
			@endforeach

		</div><!-- sidebar-section latest-post-area -->

		<div class="sidebar-section tags-area">
			<h4 class="title"><b class="light-color">Tags</b></h4>
			<ul class="tags">
				<li><a class="btn" href="#">design</a></li>
				<li><a class="btn" href="#">fasinon</a></li>
				<li><a class="btn" href="#">travel</a></li>
				<li><a class="btn" href="#">music</a></li>
				<li><a class="btn" href="#">video</a></li>
				<li><a class="btn" href="#">photography</a></li>
				<li><a class="btn" href="#">adventure</a></li>
			</ul>
		</div><!-- sidebar-section tags-area -->
	</div><!-- about-author -->
</div><!-- col-lg-4 -->