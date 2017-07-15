@if(Auth::check())
	
@else

	@extends('layouts.master')

		@section('content')
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4">
					
					<form action="/users/login" method="POST" role="form">
						{{csrf_field()}}
						<legend>
							<center>
								 <i class="fa fa-user" aria-hidden="true"></i> User Login
							</center>
						</legend>
						<center>
							<a href="/redirect" class="btn btn-primary"><span class="font">F</span>acebook</a>
							<button type="button" class="btn btn-default"><span style="color: red;" class="font">G+</span>oogle</button>
						</center> <br> <br>
						<div class="form-group">
							<label for="">Email or Phone:</label>
							<input type="phone" style="" name="phone" class="form-control" id="" placeholder="Email or Phone"> <br>
							@if ($errors->has('phone')) <p class="help-block" style="color: red">{{ $errors->first('phone') }}</p> @endif
							<label for="">Password:</label>
							<input type="password" name="password" class="form-control" id="" placeholder="Password">
							@if ($errors->has('password')) <p class="help-block" style="color: red">{{ $errors->first('password') }}</p> @endif
							
						</div>
						<center>
							<button type="submit" class="btn btn-success"> <span class=""></span> Login  </button>
							<a type="submit" href="/users/signup" class="btn btn-default">New Registeration</a> <br> <br>
							<a type="submit" class="#">Forgotten Password<i class="fa fa-question" aria-hidden="true"></i> </a>
						</center>
					</form>							
				</div>
			</div>
		@endsection
@endif