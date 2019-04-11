@extends('admin.master')
@section('title', 'Users')
@section('content')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div style="margin-bottom: 10px;">
    		<button type="button" class="btn btn-primary"><a href="{{ route('adminaddnews') }}">Create</a></button>
    	</div>
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card">
					<h5 class="card-header">List User</h5>
					<div class="card-body p-0">
						<div class="table-responsive">
							<table class="table">
								<thead class="bg-light">
									<tr class="border-0">
										<th class="border-0">ID</th>
										<th class="border-0">Name</th>
										<th class="border-0">User</th>
										<th class="border-0">Category</th>
										<th class="border-0">Image</th>
										<th class="border-0">Description</th>
										<th class="border-0">Status</th>
										<th class="border-0" colspan="3">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($news as $new)
										<tr>
											<td>{{ $new->id }}</td>
											<td>{{ $new->username }}</td>
											<td>{{ $new->users->username }}</td>
											<td>{{ $new->categories->name }}</td>
											<td><img src="{{ asset('images/news/'.$new->image) }}" style="width: 200px; height: 100px;"></td>
											<td>{{ $new->description }}</td>
											<td>
												<?php 
													if ($new->status == 1 ) {
														echo '<button type="button" class="btn btn-success">Confirmed</button>';
													}else{
														echo '<button type="button" class="btn btn-danger">Pending</button>';
													}
												 ?>
											</td>
											<td>
												<button type="button" class="btn btn-success"><a href="{{ route('admineditnews', $new->id) }}">Edit</a></button>
											</td>
											<td>
												<button type="button" class="btn btn-success"><a href="{{ route('adminnewnews',$new->id) }}">Update</a></button>
											</td>
											<td >
												<form action="{{ route('admindelnews', $new->id) }}" method="POST" style="margin-top: 16px;">
												 	{{ csrf_field() }}
			    									{{ method_field('DELETE') }}
													<button type="submit" class="btn btn-danger">Destroy</button>
												</form>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div>
				{{ $news->links() }}
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
extends('admin.layouts.footer')