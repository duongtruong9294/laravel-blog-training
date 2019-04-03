@extends('admin.master')
@section('title', 'Users')
@extends('admin.layouts.header')
@extends('admin.layouts.slidebar')
@section('content')
<div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12 offset-md-2">
	<div class="card">
		<h5 class="card-header">List User</h5>
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table">
					<thead class="bg-light">
						<tr class="border-0">
							<th class="border-0">#</th>
							<th class="border-0">User Name</th>
							<th class="border-0">Email</th>
							<th class="border-0">Full Name</th>
							<th class="border-0">Address</th>
							<th class="border-0">level</th>
							<th class="border-0" colspan="2">Action</th>
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
									<?php
										if ($user->level == 1) {
											echo "Admin";
										}else if ($user->level ==2 ){
											echo "Staff";
										}else{
											echo "Member";
										}
									?>
								</td>
								<td>
									<button type="button" class="btn btn-success"><a href="{{ route('adminedit',$user->id) }}">Edit</a></button>
								</td>
								<td>
									<form action="{{ route('admindeluser',$user->id) }}" method="POST">
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
@endsection
extends('admin.layouts.footer')