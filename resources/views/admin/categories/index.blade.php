@extends('admin.master')
@section('title', 'Users')
@section('content')
	<div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12 offset-md-2">
		<div class="card">
			<h5 class="card-header">List Category</h5>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table">
						<thead class="bg-light">
							<tr class="border-0">
								<th class="border-0">Name</th>
								<th class="border-0" colspan="2">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php ListMenu($data,0,'') ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
    <script type="text/javascript">
		$(document).ready(function(){
			$('.btn-danger').click(function() {
				event.preventDefault();
				var id = $(this).attr('data-id');
				var token = $("meta[name='csrf-token']").attr("content");
				$.ajax({
			        url : 'categories/'+id+'/del',
			        type: 'DELETE',
			        data: {
			        	id: id,
			        	name: "name",
			            "_token": token,
			        },
			        success: function ($data){
			        	location.reload();
			        }
			    });
			});
		});
	</script>
@endsection