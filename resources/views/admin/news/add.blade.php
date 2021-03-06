@extends('admin.master')
@section('title', 'Add News')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="section-block" id="basicform">
					<h3 class="section-title">Add News</h3>
				</div>
				<div class="card">
					<h5 class="card-header">Add News</h5>
					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
					<div class="card-body">
						<form action="{{ route('adminstorenews') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label for="inputText3" class="col-form-label">Name</label>
								<input id="inputText3" type="text" class="form-control" name="name">
							</div>
							<div class="form-group">
								<label for="inputText4" class="col-form-label">Category</label>
								<select class="form-control form-control" name="category_id">
									<?php menuParent($data,0,"") ?>
								</select>
							</div>
							<div class="form-group">
								<label for="inputText3" class="col-form-label">Image</label>
								<input id="inputText3" type="file" class="form-control" name="image">
							</div>
							<div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" id="summary-ckeditor" rows="3" name="description"></textarea>
                            </div>

						<!-- 	<div>
								<label for="inputText3" class="col-form-label">Tags</label><br/>
								<input type="text" value="" data-role="tagsinput" id="tags" name="tags" />
							</div> -->

							<div>
								<label for="password">Tags</label><br/>
								<select class="form-control js-example-tokenizer" multiple="multiple" name="tags[]">
								  	@foreach($tags as $tag)
								  		<option selected="selected" value="{{ $tag->name }}">{{$tag->name}}</option>
								  	@endforeach
								</select>
							</div>

							<div>
								<button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
	                 Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
	            </div>
	            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
	                <div class="text-md-right footer-links d-none d-sm-block">
	                    <a href="javascript: void(0);">About</a>
	                    <a href="javascript: void(0);">Support</a>
	                    <a href="javascript: void(0);">Contact Us</a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

<!-- <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script> -->
@section('js')
<script type="text/javascript">
	CKEDITOR.replace( 'summary-ckeditor' );

	$(".js-example-tokenizer").select2({
	    tags: true,
	    tokenSeparators: [',', ' ']
	})
	
	// var tags = new Bloodhound({
	//   datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
	//   queryTokenizer: Bloodhound.tokenizers.whitespace,
	//   prefetch: {
	//     url: 'create/json',
	//     filter: function(list) {
	//       	return $.map(list, function(tags) {
	//         return { name: tags }; });
	//     }
	//   }
	// });

	// tags.initialize();

	// $('#tags').tagsinput({
	//   typeaheadjs: {
	//     name: 'tags',
	//     displayKey: 'name',
 //    	valueKey: 'name',
	//     source: tags.ttAdapter()
	//   }
	// });


</script>
@endsection
