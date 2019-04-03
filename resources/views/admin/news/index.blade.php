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
							<th class="border-0">ID</th>
							<th class="border-0">Name</th>
							<th class="border-0">User</th>
							<th class="border-0">Category</th>
							<th class="border-0">Image</th>
							<th class="border-0">Description</th>
							<th class="border-0" colspan="3">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($news as $new)
							<tr>
								<td>{{ $new->id }}</td>
								<td>{{ $new->username }}</td>
								<td>{{ }}</td>
								<td></td>
								<td>{{ $new->image }}</td>
								<td>{{ $new->description }}</td>
								<td>
									<button type="button" class="btn btn-success"><a href="">Edit</a></button>
								</td>
								<td>
									<button type="button" class="btn btn-success"><a href="">Update</a></button>
								</td>
								<td>
									<form action="" method="POST">
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