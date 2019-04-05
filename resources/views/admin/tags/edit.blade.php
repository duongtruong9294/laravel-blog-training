@extends('admin.master')
@section('content')
	<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-xl-9 col-lg-12 col-md-12 col-sm-6 col-12 offset-md-2">
				<div class="section-block" id="basicform">
					<h3 class="section-title">Edit Tag</h3>
				</div>
				<div class="card">
					<h5 class="card-header">Edit Tag</h5>
					<div class="card-body">
						<form action="{{ route('adminupdatetag', $tag->id) }}" method="POST">
							@csrf
							@method('PATCH')
							<div class="form-group">
								<label for="inputText3" class="col-form-label">Name</label>
								<input id="inputText3" type="text" class="form-control" name="name" value="{{ $tag->name }}">
							</div>
							<div>
								<button type="submit" class="btn btn-primary" id="button">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
