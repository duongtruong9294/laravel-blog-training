@extends('admin.master')
@section('title', 'Edit News')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="section-block" id="basicform">
					<h3 class="section-title">Edit News</h3>
				</div>
				<div class="card">
					<h5 class="card-header">Edit News</h5>
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
						<form action="{{ route('adminupdatenews', $news->id) }}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('PATCH')
							<div class="form-group">
								<label for="inputText3" class="col-form-label">Name</label>
								<input id="inputText3" type="text" class="form-control" name="name" value="{{ $news->username }}">
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
								<br/>
								<img src="{{ asset('images/news/'.$news->image) }}" style="width: 200px; height: 100px;">
							</div>
							<div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" id="summary-ckeditor" rows="3" name="description">{{ $news->description }}</textarea>
                            </div>
							<div>
								<label for="inputText3" class="col-form-label">Tags</label><br/>
								<input type="text" value="" data-role="tagsinput" id="tags" name="tags" />
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

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );

	var tags = new Bloodhound({
	  	datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
	  	queryTokenizer: Bloodhound.tokenizers.whitespace,
	  	prefetch: {
	    	url: 'create/json',
	  	}
	});
	
	tags.initialize();

	$('#tags').tagsinput({
	  	typeaheadjs: {
		    name: 'tags',
		    displayKey: 'tags',
	    	valueKey: 'tags',
		    source: tags.ttAdapter()
	  	}
	});
</script>
