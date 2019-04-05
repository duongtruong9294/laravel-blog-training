<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>TITLE</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="{{ asset('resource/frontend/
	common-css/bootstrap.css') }}" rel="stylesheet">

	<link href="{{ asset('resource/frontend/common-css/ionicons.css') }}" rel="stylesheet">


	<link href="{{ asset('resource/frontend/02-Single-post/css/styles.css') }}" rel="stylesheet">

	<link href="{{ asset('resource/frontend/02-Single-post/css/responsive.css') }}" rel="stylesheet">

</head>
<body>
	@include('frontend.layouts.header')
	<section class="blog-area">
		<div class="container">
			<div class="row">

				<div class="col-lg-8 col-md-12">
					<div class="blog-posts">

						<div class="single-post">
							<div class="image-wrapper"><img src="{{ asset('images/news/'.$new->image) }}" alt="Blog Image" style="width: 730px; height: 438px"></div>

							<div class="icons">
								<div class="left-area">
									<b class="btn caegory-btn">{{ $new->categories->name }}</b>
								</div>
								<ul class="right-area social-icons">
									<li><a href="#"><i class="ion-android-share-alt"></i>Share</a></li>
									<li><a href="#"><i class="ion-android-favorite-outline"></i>03</a></li>
									<li><a href="#"><i class="ion-android-textsms"></i>06</a></li>
								</ul>
							</div>
							<p class="date"><em>Monday, October 13, 2017</em></p>
							<h3 class="title"><b class="light-color">{{ $new->username }}</b></h3>
							<p class="desc">{{ $new->description }}</p>

							<ul>
								<li><a class="btn" href="#">design</a></li>
								<li><a class="btn" href="#">fashion</a></li>
							</ul>

						</div><!-- single-post -->

						<div class="post-author">
							<div class="author-image"><img src="{{ asset('resource/frontend/images/author-1-200x200.jpg') }}" alt="Autohr Image"></div>

							<div class="author-info">
								<h4 class="name"><b class="light-color">{{ $new->users->name }}</b></h4>

								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
								dolore magnam aliquam quaerat voluptatem.</p>

								<ul class="social-icons">
									<li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
									<li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
									<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
									<li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
									<li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
								</ul><!-- right-area -->

							</div><!-- author-info -->
						</div><!-- post-author -->

						<div class="comments-area">
							<h4 class="title"><b class="light-color">2 Comments</b></h4>
							<div class="comment">
								<div class="author-image"><img src="{{ asset('resource/frontend/images/author-2-150x150.jpg') }}" alt="Autohr Image"></div>
								<div class="comment-info">
									<h5><b class="light-color">William Smith</b></h5>
									<h6 class="date"><em>Monday, October 30, 2017</em></h6>
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
										dolore magnam aliquam quaerat voluptatem.</p>
								</div>
							</div><!-- comment -->

							<div class="comment">
								<div class="author-image"><img src="{{ asset('resource/frontend/images/author-3-150x150.jpg') }}" alt="Autohr Image"></div>
								<div class="comment-info">
									<h5><b class="light-color">William Smith</b></h5>
									<h6 class="date"><em>Monday, October 30, 2017</em></h6>
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
										dolore magnam aliquam quaerat voluptatem.</p>
								</div>
							</div><!-- comment -->

						</div><!-- comments-area -->

						<div class="leave-comment-area">
							<h4 class="title"><b class="light-color">Leave a comment</b></h4>
							<div class="leave-comment">

								<form method="post">
									<div class="row">
										<div class="col-sm-6">
											<input class="name-input" type="text" placeholder="Name">
										</div>
										<div class="col-sm-6">
											<input class="email-input" type="text" placeholder="Email">
										</div>
										<div class="col-sm-12">
											<input class="subject-input" type="text" placeholder="Subject">
										</div>
										<div class="col-sm-12">
											<textarea class="message-input" rows="6" placeholder="Message"></textarea>
										</div>
										<div class="col-sm-12">
											<button class="btn btn-2"><b>COMMENT</b></button>
										</div>

									</div><!-- row -->
								</form>

							</div><!-- leave-comment -->

						</div><!-- comments-area -->

					</div><!-- blog-posts -->
				</div><!-- col-lg-4 -->


				@include('frontend.layouts.leftslide')

			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->

	<footer>
		<div class="container">
			<div class="row">

				<div class="col-sm-6">
					<div class="footer-section">
						<p class="copyright">Juli &copy; 2018. All rights reserved. | This template is made with <i class="ion-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-sm-6">
					<div class="footer-section">
						<ul class="social-icons">
							<li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
						</ul>
					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

			</div><!-- row -->
		</div><!-- container -->
	</footer>


	<!-- SCIPTS -->

	<script src="{{ asset('resource/frontend/common-js/jquery-3.1.1.min.js') }}"></script>

	<script src="{{ asset('resource/frontend/common-js/tether.min.js') }}"></script>

	<script src="{{ asset('resource/frontend/common-js/bootstrap.js') }}"></script>

	<script src="{{ asset('resource/frontend/common-js/scripts.js') }}"></script>

</body>
</html>
