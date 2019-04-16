@extends('admin.master')
@section('title', 'Users')
@section('content')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card">
					<div class="card-body p-0">
						<div class="table-responsive">
							<table class="table" id="myTable">
								<thead class="bg-light">
									<tr class="border-0">
										<th class="border-0">#</th>
										<th class="border-0">User Name</th>
										<th class="border-0">Email</th>
										<th class="border-0">Full Name</th>
										<th class="border-0">Address</th>
										<th class="border-0">Role</th>
										<th class="border-0"></th>
										<th class="border-0"></th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
										<tr>
											<td>{{ $user->id }}</td>
											<td>{{ $user->username }}</td>
											<td>{{ $user->email }}</td>
											<td>{{ $user->fullname }}</td>
											<td>{{ $user->address }}</td>
											<td>
												@foreach($user->roles as $role)
													{{ $role->name }},
												@endforeach
											</td>
											<td>
												<button type="button" class="btn btn-success"><a href="{{ route('adminedit',$user->id) }}">Edit</a></button>
											</td>
											<td>
												<form action="{{ route('admindeluser',$user->id) }}" method="POST" style="margin-top: 16px;">
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
				{{ $users->links() }}
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
@section('js')
	<script type="text/javascript">
		$(document).ready( function () {
   	 		$('#myTable').DataTable();
		} );
	</script>
@endsection