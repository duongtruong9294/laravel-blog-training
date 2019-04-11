@extends('admin.master')
@section('title', 'Edit Category')
@section('content')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="section-block" id="basicform">
					<h3 class="section-title">Edit Category</h3>
				</div>
				<div class="card">
					<h5 class="card-header">Edit Category</h5>
					<div class="card-body">
						<form action="{{ route('adminupdatecate', $category->id) }}" method="POST">
							@csrf
							@method('PATCH')
							<div class="form-group">
								<label for="inputText4" class="col-form-label">Parent Category</label>
								<select class="form-control form-control" name="parent_id">
									<option value="0">---Root---</option>
									<?php MenuEdit($data,$category,0,"") ?>
								</select>
							</div>
							<div class="form-group">
								<label for="inputText3" class="col-form-label">Name</label>
								<input id="inputText3" type="text" class="form-control" name="name" value="{{ $category->name }}">
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
@endsection
