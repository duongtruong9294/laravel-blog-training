<?php
	use App\Category;
	use Illuminate\Support\Facades\Auth;
	use App\Comment;
	use Carbon\Carbon; 

	$categories = Category::select('id','name','parent_id')->get();

	$comments = Comment::with('user')->with('new')->orderBy('created_at','desc')->get();
 ?>
    <link rel="stylesheet" type="text/css" href="https://skywalkapps.github.io/bootstrap-notifications/stylesheets/bootstrap-notifications.css">
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

    		  	<li class="dropdown dropdown-notifications">
                    <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                        <i id="abc" data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>
                    </a>
                    <div class="dropdown-container">
                        <div class="dropdown-toolbar">
                            <div class="dropdown-toolbar-actions">
                                <a href="#">Mark all as read</a>
                            </div>
                            <h3 class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)</h3>
                        </div>
                        <ul class="dropdown-menu">
                        	@foreach($comments as $comment)
                    			@if (Auth::user()->id === $comment->new->user_id)
		                        	<li class="notification active">
						              	<div class="media">
						                <div class="media-left">
						                  	<div class="media-object">
						                   		<img src="https://api.adorable.io/avatars/71/`+avatar+`.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
						                  	</div>
						                </div>
						                <div class="media-body">
						                	<p class="notification-desc">{{ $comment->user->username }}</p>
						                  	<strong class="notification-title"><a href="{{ route('news.show',$comment->new->id) }}">{{ $comment->content }}</a></strong>
						                  	<p class="notification-desc">{{ $comment->new->username }}</p>
						                  	<div class="notification-meta">
						                    	<small class="timestamp"><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans() ?></small>
						                  	</div>
						                </div>
						              </div>
						          </li>
					          	@endif
					        @endforeach
                        </ul>
                        <div class="dropdown-footer text-center">
                            <a href="#">View All</a>
                        </div>
                    </div>
                </li>
    		@endif
		</ul><!-- main-menu -->
	</div><!-- conatiner -->
</header>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style type="text/css">
	.media-body {
		margin-left: 15px;
	}
</style>