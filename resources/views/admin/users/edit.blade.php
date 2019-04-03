@extends('admin.master')
@section('title', 'Users')
@extends('admin.layouts.header')
@extends('admin.layouts.slidebar')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-xl-9 col-lg-12 col-md-12 col-sm-6 col-12 offset-md-2">
				<div class="section-block" id="basicform">
					<h3 class="section-title">Edit Form User</h3>
				</div>
				<div class="card">
					<h5 class="card-header">Edit Form User</h5>
					<div class="card-body">
						<form>
							<div class="form-group">
								<label for="inputText3" class="col-form-label">UserName</label>
								<input id="inputText3" type="text" class="form-control" name="username">
							</div>
							<div class="form-group">
								<label for="inputEmail">Email</label>
								<input id="inputEmail" type="email" placeholder="" class="form-control" name="email">
							</div>
							<div class="form-group">
								<label for="inputText4" class="col-form-label">Full name</label>
								<input id="inputText4" type="text" class="form-control" placeholder="" name="fullname">
							</div>
							<div class="form-group">
								<label for="inputPassword">Password</label>
								<input id="inputPassword" type="password" placeholder="" class="form-control" name="password">
							</div>
							<div class="form-group">
								<label for="inputText4" class="col-form-label">Address</label>
								<input id="inputText4" type="text" class="form-control" placeholder="" name="address">
							</div>
							 <div class="form-group">
							 	<label for="inputText4" class="col-form-label">Role</label>
                                <select class="form-control form-control">
                                	@foreach($users as $user)
                                    	<option value="{{ $user->id }}">
                                			<?php
                                				if($user->level == 1){
                                					echo "Admin";
                                				}else if ($user->level == 2){
                                					echo "Staff";
                                				}else{
                                					echo "Member";
                                				}
                                			?>
                                    	</option>
                                    @endforeach
                                </select>
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
</div>

extends('admin.layouts.footer')