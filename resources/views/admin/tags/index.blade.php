@extends('admin.master')
@section('content')
<div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12 offset-md-2">
	<div class="card">
		<h5 class="card-header">List Tag</h5>
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table">
					<thead class="bg-light">
						<tr class="border-0">
							<th class="border-0">ID</th>
							<th class="border-0">Name</th>
							<th class="border-0" colspan="2">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tags as $tag)
							<tr>
								<td>{{ $tag->id }}</td>
								<td>{{ $tag->name }}</td>
								<td>
									<button type="button" class="btn btn-success"><a href="{{ route('adminedittag', $tag->id) }}">Edit</a></button>
								</td>
								<td>
									<form action="{{ route('admindeltag', $tag->id) }}" method="POST">
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
