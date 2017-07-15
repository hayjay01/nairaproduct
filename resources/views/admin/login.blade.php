@extends('layouts.dashboard')

@section('title')
	Admin | Login
@endsection

@section('content')
	
	
		<script type="text/javascript">
			var i = 0;
			function makeProgress(){
				if(i < 100){
					i = i + 1;
					$(".progress-bar").css("width", i + "%").text(i + " %");
				}
				// Wait for sometime before running this script again
				setTimeout("makeProgress()", 100);
			}
			makeProgress();
		</script>

	<div class="row">

		<div class="col-xs-8 well col-xs-offset-2 col-sm-7 col-sm-offset-2 col-md-4 col-md-offset-4">
			<form action="" method="POST" role="form">
				{{csrf_field()}}
				<legend> <center>Administrator's Login</center></legend>
					{{-- <div class="progress progress-striped active">
						<div class="progress-bar"></div>
					</div> --}}
				<center>
					<img src="{{asset('images/lock.png')}}" class="img img-responsive img-rounded">
				</center>
				<div class="form-group">
					<label for="">Email/Phone:</label>
					<input type="email" name="email" class="form-control" id="" placeholder="admin email goes here..">
				@if ($errors->has('email')) <p class="help-block" style="color: red">{{ $errors->first('email') }}</p> @endif

				</div>
				<div class="form-group">
					<label for="">Password:</label>
					<input type="password" name="password" class="form-control" id="" placeholder="Grooms name here...">
					@if ($errors->has('password')) <p class="help-block" style="color: red">{{ $errors->first('password') }}</p> @endif

				</div>
				<center>
					<input type="submit" name="submit" class="btn btn-success" value="Login">
				</center>
			</form>
		</div>
	</div> 
@endsection