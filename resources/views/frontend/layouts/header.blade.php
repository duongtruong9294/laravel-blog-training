<?php
	use App\Category;

	$categories = Category::select('id','name','parent_id')->get();
 ?>

<header>
	<div class="top-menu">

		<ul class="left-area welcome-area">
			<li class="hello-blog">Hello nice people, welcome to my blog</li>
			<li><a href="mailto:contact@juliblog.com">contact@juliblog.com</a></li>
		</ul><!-- left-area -->
		<div class="right-area">

			<div class="src-area">
				<form action="{{ route('search') }}" method="post">
					<input class="src-input" type="text" placeholder="Search" name="name" id="key">
					<button class="src-btn" id="search" type="button"><i class="ion-ios-search-strong"></i></button>
				</form>
			</div><!-- src-area -->

			<ul class="social-icons">
				<li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
				<li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
				<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
				<li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
				<li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
			</ul><!-- right-area -->

		</div><!-- right-area -->

	</div><!-- top-menu -->

	<div class="middle-menu center-text"><a href="#" class="logo"><img src="{{ asset('resource/frontend/images/logo.png') }}" alt="Logo Image"></a></div>

	<div class="bottom-area">

		<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

		<ul class="main-menu visible-on-click" id="main-menu">
			<li><a href="#">HOME</a></li>
			<li class="drop-down"><a href="#!">CATEGORY<i class="ion-ios-arrow-down"></i></a>
				<ul class="drop-down-menu">
					@foreach($categories as $category)
						@if ($category->parent_id === 0)
							<li class="drop-down"><a href="#!">{{ $category->name }}<i class="ion-ios-arrow-right"></i></a>
								<ul class="drop-down-menu drop-down-inner">
									@foreach($categories as $abc)
										@if ($abc->parent_id === $category->id)
											<li><a href="#">{{ $abc->name }}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
						@endif
					@endforeach
				</ul>
			</li>
			<li><a href="#">FEATURED</a></li>
			<li><a href="#">ABOUT</a></li>
			<li><a href="#">CATEGORIES</a></li>
			<li><a href="#">CONTACT</a></li>
		</ul><!-- main-menu -->
	</div><!-- conatiner -->
</header>
