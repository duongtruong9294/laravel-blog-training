@extends('admin.master')
@section('title', 'Add News')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-xl-9 col-lg-12 col-md-12 col-sm-6 col-12 offset-md-2">
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
						<form action="{{ route('adminaddnews') }}" method="POST" enctype="multipart/form-data">
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
                                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
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
