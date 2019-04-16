<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<div class="container-fluid">
	<form action="{{ route('store') }}" method="POST" class="register-form"> 
		@csrf
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<div class="row">      
			<div class="col-md-4 col-sm-4 col-lg-4">
				<label for="firstName">USERNAME</label>
				<input name="username" class="form-control" type="text">    
			</div>            
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-4 col-lg-4">
				<label for="email">EMAIL</label>
				<input name="email" class="form-control" type="email">             
			</div>            
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-4 col-lg-4">
				<label for="password">PASSWORD</label>
				<input name="password" class="form-control" type="password">             
			</div>            
		</div>

		<div>
			<label for="password">Role</label><br/>
			<select class="form-control js-example-tokenizer" multiple="multiple" name="roles[]">
			  	@foreach($roles as $role)
			  		<option selected="selected" value="{{ $role->id }}">{{$role->name}}</option>
			  	@endforeach
			</select>
		</div>

		<div class="row">      
			<div class="col-md-4 col-sm-4 col-lg-4">
				<label for="firstName">FULLNAME</label>
				<input name="fullname" class="form-control" type="text">    
			</div>            
		</div>
		<div class="row">      
			<div class="col-md-4 col-sm-4 col-lg-4">
				<label for="firstName">ADDRESS</label>
				<input name="address" class="form-control" type="text">    
			</div>            
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
				<button type="submit" class="btn btn-default regbutton">Register</button>
			</div>      
		</div>    
	</form>
</div>
<style type="text/css">
body, html{
	background-color:#34515E;
	font-family: 'Open Sans Condensed', sans-serif;
	font-size: 18px;

}

.register-form{
	font-size: 16px;
	left: 50%;
	top: 50%;
	position: absolute;
	-webkit-transform: translate3d(-50%, -50%, 0);
	-moz-transform: translate3d(-50%, -50%, 0);
	transform: translate3d(-50%, -50%, 0);
}

.regbutton{    
	height: 50px;
	width: 200px;
	background-color:tomato;
	border-radius: 0px;
	font-size: 18px;
	color:white;
	border: none !important;
	margin-bottom: 5px;
}
.regbutton:hover{    
	color: white;
	background-color:#aa422f;
}
.regbutton:active{    
	color: white;
	background-color:#aa422f;
}
.logbutton{    
	height: 50px;
	width: 200px;
	background-color:yellowgreen;
	border-radius: 0px;
	font-size: 18px;
	color:white;
	border: none !important;
	margin-bottom: 5px;
}
.logbutton:hover{    
	color: white;
	background-color:darkolivegreen;
}
.logbutton:active{    
	color: white;
	background-color:darkolivegreen;
}



.register-form label{
	color: aliceblue;

}
.register-form input{
	margin-bottom: 5px;
	width: 430px;
	height: 40px;
	border-radius: 0px;
}

</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
	$(".js-example-tokenizer").select2({
	    tags: true,
	    tokenSeparators: [',', ' ']
	})

</script>