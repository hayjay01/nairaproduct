@extends('layouts.master')
	@section('content')
		<div class="row">
			<div class="row">
				<form action="/users/signup" method="POST" role="form" enctype="multipart/form-data">
				{{csrf_field()}}
					<div class="col-lg-4 col-lg-offset-4 col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">

							<legend>
								<center>
									 <i class="fa fa-user" aria-hidden="true"></i> Quick Signup	
								</center>
							</legend>
							<center>
								<a href="/redirect" class="btn btn-primary"><span class="font">F</span>acebook</a>
								<button type="button" class="btn btn-default"><span style="color: red;" class="font">G+</span><span style="color: purple; font-weight:bold;">o</span>gle</button>
							</center> <br> 
							<div class="row">
								<div class="col-lg-6">
								<label for="">Name:</label>
									<input type="text" placeholder="lastname here" name="firstname" id="input" class="form-control" value="" >
								@if ($errors->has('firstname')) <p class="help-block" style="color: red">{{ $errors->first('firstname') }}</p> @endif <br> 
									
								</div>
								<div class="col-lg-6 ">
									<label for="">Email: </label>
									
									<input type="text" placeholder="mail address here" name="email" id="input" class="form-control" value="" >
								@if ($errors->has('email'))<p class="help-block" style="color: red">{{ $errors->first('email') }}</p> @endif <br> 
									
								</div>	
							</div>
							<div class="row">
								
								<div class="col-lg-6">
								<label for="">Phone:</label>
									<input type="text" placeholder="phone here" name="phone" id="input" class="form-control" value="" >
								@if ($errors->has('phone'))<p class="help-block" style="color: red">{{ $errors->first('phone') }}</p> @endif <br> 
									
								</div>

								<div class="col-lg-6">
									<label for="">Password:</label>
										<input type="password" placeholder="Desired password" name="password" id="input" class="form-control" value="" >
									@if ($errors->has('password')) <p class="help-block" style="color: red">{{ $errors->first('password') }}</p> @endif <br> 
										
								</div>
							</div>
							<div class="row">
								
							</div>
							<center>
								<label for="">Display Picture:</label>
								<input type="file" name="picture" class="form-control" id="" placeholder="Your image here...."> 
								@if ($errors->has('picture'))  <p class="help-block" style="color: red">{{ $errors->first('picture') }}</p> @endif  <br>

							</center>
							<center>
								<button type="submit" class="btn btn-success"> Signup </button>
								<a href="{{url('users/login')}}" class="btn btn-default">Login</a>
							</center> <br> <br>
					</div>

				</form>			

			</div>
		</div>
	@endsection