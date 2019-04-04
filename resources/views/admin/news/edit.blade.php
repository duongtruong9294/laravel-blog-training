@extends('admin.master')
@section('title', 'Edit News')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-xl-9 col-lg-12 col-md-12 col-sm-6 col-12 offset-md-2">
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
						<form action="{{ route('adminupdatenews', $new->id) }}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('PATCH')
							<div class="form-group">
								<label for="inputText3" class="col-form-label">Name</label>
								<input id="inputText3" type="text" class="form-control" name="name" value="{{ $new->username }}">
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
								<img src="{{ asset('images/news/'.$new->image) }}" style="width: 200px; height: 100px;">
							</div>
							<div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" id="description" rows="3" name="description" value="{{ $new->description }}"></textarea>
                            </div>
							<div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>
