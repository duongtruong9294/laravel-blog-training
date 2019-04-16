@extends('admin.master')
@section('content')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div style="margin-bottom: 10px;">
			<button type="button" class="btn btn-primary"><a href="{{ route('admincreatetag') }}">Create</a></button>
		</div>
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card">
					<h5 class="card-header">List Tag</h5>
					<div class="card-body p-0">
						<div class="table-responsive">
							<table class="table" id="myTable">
								<thead class="bg-light">
									<tr class="border-0">
										<th class="border-0">ID</th>
										<th class="border-0">Name</th>
										<th class="border-0"></th>
										<th class="border-0"></th>
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
												<form action="{{ route('admindeltag', $tag->id) }}" method="POST" style="margin-top: 16px;">
												 	{{ csrf_field() }}
			    									{{ method_field('DELETE') }}
													<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Destroy</button>
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
				{{ $tags->links() }}
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
@section('js')
	<script type="text/javascript">
		$(document).ready( function () {
   	 		$('#myTable').DataTable();
		} );
	</script>
@endsection
