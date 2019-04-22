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






    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

	
</head>
<?php
	use Carbon\Carbon; 
 ?>
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
								@foreach($new->tags as $tag)
									<li><a class="btn" href="{{ route('postbytag', $tag->id) }}">{{ $tag->name }}</a></li>
								@endforeach
							</ul>

							<div class="rating">
                                <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="3" data-size="xs">
                                <input type="hidden" name="id" required="" value="{6">
                                <span class="review-no">422 reviews</span>
                                <br/>
                                <button class="btn btn-success">Submit Review</button>
                            </div>

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
							@include('frontend.news.display_comment', ['comments' => $new->comments, 'new_id' => $new->id])
						</div>

						<div class="leave-comment-area">
							<h4 class="title"><b class="light-color">Leave a comment</b></h4>
							<div class="leave-comment">

								<form method="post" action=" {{ route('postMessage') }} ">
									@csrf
									<div class="row">
										<input name="new_id" type="hidden" value="{{ $new->id }}">
										<div class="col-sm-12">
											<textarea class="message-input" rows="6" placeholder="Comment" name="content"></textarea>
										</div>
										<div class="col-sm-12">
											<button type="submit" class="btn btn-2"><b>COMMENT</b></button>
										</div>

									</div>
								</form>

							</div>

						</div>

					</div>
				</div>


				@include('frontend.layouts.leftslide')

			</div>
		</div>
	</section>

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

<style type="text/css">
	.rating-loading{
    width:25px;
    height:25px;
    font-size:0;
    color:#fff;
    background:url(../img/loading.gif) top left no-repeat;border:none
    }
.rating-container .rating-stars
    {position:relative;
    cursor:pointer;
    vertical-align:middle;
    display:inline-block;
    overflow:hidden;
    white-space:nowrap
         }
         .rating-container .rating-input
         {position:absolute;
         cursor:pointer;
         width:100%;
         height:1px;
         bottom:0;left:0;
         font-size:1px;
         border:none;
         background:0 0;
         padding:0;
         margin:0
         }
         .rating-disabled .rating-input,.rating-disabled .rating-stars
         {
             cursor:not-allowed
             
         }
         .rating-container .star{
             display:inline-block;
             margin:0 3px;
             text-align:center
         }
         .rating-container .empty-stars{
             color:#aaa
         }
         .rating-container .filled-stars
         {
             position:absolute;
             left:0;
             top:0;
             margin:auto;
             color:#fde16d;
             white-space:nowrap;
             overflow:hidden;
             -webkit-text-stroke:1px #777;
             text-shadow:1px 1px #999
         }
             .rating-rtl
             {
                 float:right
                 
             }
             .rating-animate .filled-stars
             {
                 transition:width .25s ease;
                 -o-transition:width .25s ease;
                 -moz-transition:width .25s ease;-webkit-transition:width .25s ease
             }
             .rating-rtl .filled-stars
             {left:auto;right:0;-moz-transform:matrix(-1,0,0,1,0,0) translate3d(0,0,0);-webkit-transform:matrix(-1,0,0,1,0,0) translate3d(0,0,0);-o-transform:matrix(-1,0,0,1,0,0) translate3d(0,0,0);
             transform:matrix(-1,0,0,1,0,0) translate3d(0,0,0)}.rating-rtl.is-star 
             .filled-stars{
                 right:.06em
                 
             }
             .rating-rtl.is-heart .empty-stars{
                 margin-right:.07em
                 
             }
             .rating-lg{
                 font-size:3.91em
                 
             }
             .rating-md{
                 font-size:3.13em
                 
             }
             .rating-sm{
                 font-size:2.5em
                 
             }
             .rating-xs{
                 font-size:2em
                 
             }
             .rating-xl{
             font-size:4.89em
                 
             }
             .rating-container .clear-rating{
                 color:#aaa;
                 cursor:not-allowed;
                 display:inline-block;
                 vertical-align:middle;
                 font-size:60%;
                 padding-right:5px
                 
             }
             .clear-rating-active{
                 cursor:pointer!important
                 
             }
             .clear-rating-active:hover{
                 color:#843534
                 
             }
             .rating-container .caption{
                 color:#999;
                 display:inline-block;
                 vertical-align:middle;
                 font-size:60%;
                 margin-top:-.6em;
                 margin-left:5px;
                 margin-right:0
                 
             }
             .rating-rtl .caption{
                 margin-right:5px;
                 margin-left:0
                 
             }
             @media print{.rating-container .clear-rating{
                 display:none
                 
             }
                 
             }
</style>
