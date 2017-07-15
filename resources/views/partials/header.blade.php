<div class="sticky_nav">
	<nav class="navbar navbar-default navbar-fixed" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<!-- var_dump($current_user_full_details) -->
									<i style="margin-top: -9px;">
									
									</i>	
							
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav">
								<li class="">
								@if(Auth::check())
									<a href="{{route('users.view_request')}}">
										
										
											
									<i>@if($current_user_role ===1)
											{{ 'REQUEST IT!' }}

																									@else
											{{ 'REQUEST IT' }}
									   @endif
									</i>
										

									</a>

									</li>


								@else 
									<a href="{{route('index')}}">
									<i>REQUEST IT</i>
									</a></li>
								@endif

							</ul>


							<ul class="nav navbar-nav navbar-right">
								@if(Auth::check())
									@if($current_user_role === 1)

										<li><a  id="notification" href="#"> <span class="glyphicon glyphicon-envelope" ></span>  Messages 
						        			<span class="badge badge_notify"><b>4</b></span>

										</a></li>

										@else
										<li><a  href="#modal-new" id="notification" data-toggle="modal" > <i class="glyphicon glyphicon-plus "></i> New Request</span> <span class="badge badge_notify"><b>?</b></span> <!-- <i class="fa fa-question-circle" aria-hidden="true"></i> -->

										</a></li>

										<li><a  id="notification" href="#"> <span class="glyphicon glyphicon-globe" ></span>  Notifications 
						        			<span class="badge badge_notify"><b>4</b></span>

										</a></li>
									@endif
									
								@endif
								
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										@if(isset($current_user_image))
													
													<img src='{{ asset("images/$current_user_image") }}' class="img img-responsive img-circle" width="36" height="30" style="margin-top: -6px;" class="img-responsive" alt="Image">
													
										@else
          									<img src="{{ asset("images/person-flat.png") }}" class="avatar img-circle img-responsive" style="display: inline-block;" alt="avatar" width="30" height="40">
          									@if(Auth::check())
												@else
												<button type="submit" style="margin-left: 10px;" class="btn btn-sm btn-default"><b>Sign Up!</b></button>
											@endif

										@endif
										
									
									<ul class="dropdown-menu drop_menus">
							            @if(Auth::check())
							            	<li><a href="{{ route('users.edit') }}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Profile </a></li>

							            	<li><a href="{{ route('users.view_request') }}"> <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a></li>
								            <li role="separator" class="divider"></li>
							            	<li><a href="{{ route('signout') }}"> <i class="fa fa-lock" aria-hidden="true"></i> Logout</a></li>
										@else
								            <li role="separator" class="divider"></li>
											<li><a href="{{route('users.signup')}}">Signup</a></li>
											<li><a href="{{route('index')}}">Login</a></li>

										@endif
									</ul>
								</li>
							</ul>
						</div><!-- /.navbar-collapse -->
				
			</div>
		</div>
	</nav>
	
</div>

<!-- ldfdlf;dlfd -->
