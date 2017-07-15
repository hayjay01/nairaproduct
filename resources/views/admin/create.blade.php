@extends('layouts.dashboard')
	@section('content')
		<div class="row">
			<div class=" col-lg-5 col-lg-offset-3 well">
					<form action="" method="POST" role="form">
                           {{csrf_field()}}
						
						<legend><center>
							Create Administrator
						</center></legend>

						@if (session('success'))
                               <div class="alert alert-success">
                                   {{ session('success') }}
                               </div>
                           @elseif(session('delete_message'))
                               <div class="alert alert-danger">
                                   {{ session('delete_message') }}
                               </div>
                               
                           @endif
						<div class="form-group col-lg-6">
							<label for="">Firstname:</label>
							<input type="text" name="firstname" class="form-control" id="" placeholder="Firstname here"> <br>
								@if ($errors->has('firstname')) <p class="help-block" style="color: red">{{ $errors->first('firstname') }}</p> @endif
						</div>
						<div class="form-group col-lg-6">
							<label for="">Email:</label>
							<input type="text" name="email" class="form-control" id="" placeholder="Email address here"> <br>
								@if ($errors->has('email')) <p class="help-block" style="color: red">{{ $errors->first('email') }}</p> @endif
						</div>
						
						<div class="form-group col-lg-6">
							<label for="">Phone:</label>
							<input type="text" name="phone" class="form-control" id="" placeholder="Phone number"> <br>
								@if ($errors->has('phone')) <p class="help-block" style="color: red">{{ $errors->first('phone') }}</p> @endif
						</div>
						<div class="form-group col-lg-6">
							<label for="">Password:</label>
							<input type="password" name="password" class="form-control" id="" placeholder="Password here"> <br>
								@if ($errors->has('password')) <p class="help-block" style="color: red">{{ $errors->first('password') }}</p> @endif

						</div>
						<div class="form-group col-lg-12">
							<label for="">Confirm Password:</label>
							<input type="password" name="confirm_password" class="form-control" id="" placeholder="Confirm password"> <br>
								@if ($errors->has('confirm_password')) <p class="help-block" style="color: red">{{ $errors->first('confirm_password') }}</p> @endif
						</div>
						<center>
							<button type="submit" class="btn btn-default"> <i class="fa fa-user"></i> Create</button>
						</center>
						
					</form>
			</div>
		</div>
	@endsection