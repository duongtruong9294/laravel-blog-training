<?php
	use App\Category;
	use Illuminate\Support\Facades\Auth;
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
				<form action="{{ route('index') }}" method="get">
					<input class="src-input" type="text" placeholder="Search" name="search" id="key">
					<button type="submit" class="src-btn" id="search" type="button"><i class="ion-ios-search-strong"></i></button>
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
							<li class="drop-down"><a href="{{ route('postbycate',$category->id) }}">{{ $category->name }}<i class="ion-ios-arrow-right"></i></a>
								<ul class="drop-down-menu drop-down-inner">
									<?php echo MenuView($categories,$category->id); ?>
								</ul>
							</li>
						@endif
					@endforeach
				</ul>
			</li>
			@if (!Auth::check())
				<li><a href="{{ route('adminlogin') }}">LOGIN</a></li>
				<li><a href="{{ route('register') }}">REGISTER</a></li>
			@else
				<li><a href="{{ route('adminlogout') }}">LOGOUT</a></li>
    		@endif
		</ul><!-- main-menu -->
	</div><!-- conatiner -->
</header>
