<?php
	use App\User;
	use App\Category;
	use App\News;
	use App\Tag;

	$new_news = News::with('categories')->orderBy('created_at', 'desc')->take(4)->get();
	$categories = Category::all();
	$tags = Tag::all();
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

		<div class="sidebar-section latest-post-area">
			<h4 class="title"><b class="light-color">Latest Posts</b></h4>
			@foreach($new_news as $new)
				<div class="latest-post" href="#">
					<div class="l-post-image"><img src="{{ asset('images/news/'.$new->image) }}" alt="Category Image"></div>
					<div class="post-info">
						<a class="btn category-btn" href="#">{{ $new->categories->name }}</a>
						<h5><a href="#"><b class="light-color">{{ $new->username }}</b></a></h5>
						<h6 class="date"><em>{{ $new->created_at }}</em></h6>
						<p>{{ $new->description }}</p>
					</div>
				</div>
			@endforeach

		</div><!-- sidebar-section latest-post-area -->

		<div class="sidebar-section tags-area">
			<h4 class="title"><b class="light-color">Tags</b></h4>
			<ul class="tags">
				@foreach($tags as $tag)
				<li><a class="btn" href="{{ route('postbytag', $tag->id) }}">{{ $tag->name }}</a></li>
				@endforeach
			</ul>
		</div><!-- sidebar-section tags-area -->
	</div><!-- about-author -->
</div><!-- col-lg-4 -->