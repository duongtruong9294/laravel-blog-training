@extends('admin.master')
@section('title', 'Users')
@section('content')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="section-block" id="basicform">
					<h3 class="section-title">Edit Form User</h3>
				</div>
				<div class="card">
					<h5 class="card-header">Edit Form User</h5>
					<div class="card-body">
						<form action="{{ route('adminupdate',$users->id) }}" method="post">
							@csrf
							@method('PATCH')
							<div class="form-group">
								<label for="inputText3" class="col-form-label">UserName</label>
								<input id="inputText3" type="text" class="form-control" name="username" value="{{ $users->username }}" disabled="true" style="color:red">
							</div>
							<div class="form-group">
								<label for="inputEmail">Email</label>
								<input id="inputEmail" type="email" placeholder="" class="form-control" name="email" value="{{ $users->email }}">
							</div>
							<div class="form-group">
								<label for="inputText4" class="col-form-label">Full name</label>
								<input id="inputText4" type="text" class="form-control" placeholder="" name="fullname" value="{{ $users->fullname }}">
							</div>
							<div class="form-group">
								<label for="inputText4" class="col-form-label">Address</label>
								<input id="inputText4" type="text" class="form-control" placeholder="" name="address" value="{{ $users->address }}">
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
@endsection
