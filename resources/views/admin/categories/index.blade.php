@extends('admin.master')
@section('title', 'Categories')
@section('content')
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
        	<div style="margin-bottom: 10px;">
        		<button type="button" class="btn btn-primary"><a href="{{ route('adminaddcate') }}">Create</a></button>
        	</div>
        	<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="card">
						<h5 class="card-header">List Category</h5>
						<div class="card-body p-0">
							<div class="table-responsive">
								<table class="table" id="table_id">
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