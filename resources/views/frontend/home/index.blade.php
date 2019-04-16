@extends('frontend.master')
@section('content')
<section class="section blog-area">
	<div class="container">
		<div class="row">

			<div class="col-lg-8 col-md-12">
				<div class="blog-posts">
					@forelse($news as $new)
					<div id="{{'news'.$new->id}}" class="single-post">
						<div class="image-wrapper"><img src="{{ asset('images/news/'.$new->image) }}" style="width: 730; height: 438px;" alt="Blog Image">
						</div>
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
						<p class="date"><em>{{ $new->created_at }}</em></p>
						<h3 class="title"><a href="#"><b class="light-color" id="{{'news-name'.$new->id}}">{!! str_replace( $search, '<b style="color:red">'.$search.'</b>', $new->username);!!}</b></a></h3>
						<p>{{ $new->description }}</p>
						<a class="btn read-more-btn" href="{{ route('news.show', $new->id) }}"><b>READ MORE</b></a>
					</div>
					@empty
   						 <h2 style="color: red;">No Result</h2>
					@endforelse
					<div>
						{{ $news->links() }}
					</div>
				</div><!-- blog-posts -->
			</div><!-- col-lg-4 -->
				@include('frontend.layouts.leftslide')
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->
@endsection

@section('js')
	<script type="text/javascript">
		$(document).ready(function() {
			$('#search').click(function () {
				var key = $('#key').val();
				$.ajax({
			        url : 'news/search',
			        type: 'GET',
			        dataType: 'json',
			        data: {
			        	search: key
			        },
			        success : function (data) {
		        		// $( ".single-post" ).hide();
		        		// if (data.data.length != 0 ) {
		        		// 	console.log(data);
		        		// 	for(let i = 0; i<= data.data.length; i++){
				        // 		$('#news'+data.data[i].id).show();
				        // 		var x = $('#news-name'+data.data[i].id).text();
				        // 		var content = $('#news-name'+data.data[i].id).text().replace(data.key,'<span style="color: red">'+data.key+'</span>');
				        // 		$('#news-name'+data.data[i].id).replaceWith(content);
			        	// 	}
		        		// }else{
		        		// 	console.log("khong tim thay");
		        		// }





			       		// $(".single-post").remove();
				       	// if(data.data.lenth != 0) {
				       	// 	for (let i = 0; i<= data.data.length; i++) {
				       	// 		$(".blog-posts").append('<div class="single-post">');
				       	// 	}
				       	// }
			        }
			    });
			});
		});
	</script>
@endsection
