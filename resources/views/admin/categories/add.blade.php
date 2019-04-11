@extends('admin.master')
@section('title', 'Add Category')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="section-block" id="basicform">
					<h3 class="section-title">Add Category</h3>
				</div>
				<div class="card">
					<h5 class="card-header">Add Category</h5>
					<div class="card-body">
						<form action="{{ route('adminaddcate') }}" method="POST">
							@csrf
							<div class="form-group">
								<label for="inputText4" class="col-form-label">Parent Category</label>
								<select class="form-control form-control" name="parent_id">
									<option value="0">---Root---</option>
									<?php menuParent($data,0,"") ?>
								</select>
							</div>
							<div class="form-group">
								<label for="inputText3" class="col-form-label">Name</label>
								<input id="inputText3" type="text" class="form-control" name="name">
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
