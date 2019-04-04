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

	<link href="{{ asset('resource/frontend/common-css/bootstrap.css') }}" rel="stylesheet">

	<link href="{{ asset('resource/frontend/common-css/ionicons.css') }}" rel="stylesheet">

	<link href="{{ asset('resource/frontend/common-css/layerslider.css') }}" rel="stylesheet">


	<link href="{{ asset('resource/frontend/01-homepage/css/styles.css') }}" rel="stylesheet">

	<link href="{{ asset('resource/frontend/01-homepage/css/responsive.css') }}" rel="stylesheet">

</head>
<body>

	@include('frontend.layouts.header')


	@include('frontend.layouts.slide')


	@yield('content')

<!-- 
	<section class="footer-instagram-area">

		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h5 class="title"><b class="light-color">Follow me &copy; instagram</b></h5>
				</div>
			</div>
		</div>

		<ul class="instagram">
			<li><a href="#"><img src="{{ asset('resource/frontend/images/instragram-1-300x400.jpg') }}" alt="Instagram Image"></a></li>
			<li><a href="#"><img src="{{ asset('resource/frontend/images/instragram-2-300x400.jpg') }}" alt="Instagram Image"></a></li>
			<li><a href="#"><img src="{{ asset('resource/frontend/images/instragram-3-300x400.jpg') }}" alt="Instagram Image"></a></li>
			<li><a href="#"><img src="{{ asset('resource/frontend/images/instragram-4-300x400.jpg') }}" alt="Instagram Image"></a></li>
			<li><a href="#"><img src="{{ asset('resource/frontend/images/instragram-5-300x400.jpg') }}" alt="Instagram Image"></a></li>
			<li><a href="#"><img src="{{ asset('resource/frontend/images/instragram-6-300x400.jpg') }}" alt="Instagram Image"></a></li>
			<li><a href="#"><img src="{{ asset('resource/frontend/images/instragram-7-300x400.jpg') }}" alt="Instagram Image"></a></li>
		</ul>
	</section> -->

	@include('frontend.layouts.footer')


	<!-- SCIPTS -->

	<script src="{{ asset('resource/frontend/common-js/jquery-3.1.1.min.js') }}"></script>

	<script src="{{ asset('resource/frontend/common-js/tether.min.js') }}"></script>

	<script src="{{ asset('resource/frontend/common-js/bootstrap.js') }}"></script>

	<script src="{{ asset('resource/frontend/common-js/layerslider.js') }}"></script>

	<script src="{{ asset('resource/frontend/common-js/scripts.js') }}"></script>

</body>
	@yield('js')
</html>
