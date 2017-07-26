<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA=Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link rel="shortcut icon" href="{{asset('images/logo.jpg')}} ">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('/font-awesome/css/font-awesome.min.css') }}">
	
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/my_css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/toastr.min.css') }}"/>


	@yield('styles')
</head>
<body>

<div >
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand det-txt" href="/"><img src="{{asset('images/logo.jpg')}}" class="img img-responsive" style="display: inline; font-weight:bold; width:60px; height: 60px;margin-top:-5%;"></a>

			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="{{url('/product/add_product')}}">Add a Product</a>
					</li>

						<li class="dropdown">
							@if(Auth::check())
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Hi, {{$firstname}}...<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="{{url('/logout')}}" class="glyphicon" id="navbar_dropdown_link"> Log-Out</a></li>
								</ul>
							@else
								<a href="{{url('users/login')}}" class="dropdown-toggle" > Signin <b class="caret"></b></a>
								<!--<ul class="dropdown-menu">-->
								<!--	<li><a href="{{url('users/login')}}" class="glyphicon" id="navbar_dropdown_link"> <i class="fa fa-key"></i> Login</a></li>-->
								<!--	<li><a href="{{url('users/signup')}}" class="glyphicon" id="navbar_dropdown_link"> <i class="fa fa-user"></i> New User</a></li>-->
								<!--</ul>-->
								</ul>
							@endif
						</li>
					<li>
						<a href="{{url('users/contact-us')}}" style="color: #ffffff;">Contact <i class="fa fa-phone" aria-hidden="true"></i> <i class="fa-li fa fa-spinner fa-spin"></i></a>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
</div>

<div class="">
	@yield('no_container')
</div>

<div class="container">
	@yield('content')
	
</div>
@yield('body')

	  
 
{{-- <div>
	<center style="margin-top:5%;  color: red;">
		<span>
			 (c) NairaProducts.ng 2017 
		</span>
	</center>
</div> --}}

<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
<script src="{{ asset('/js/toastr.min.js') }}"></script>

<script type="text/javascript">
	@if (session('message'))
          toastr.info("{{session('message')}}");
        @endif

        @if (session('welcome_back'))
          toastr.success("{{session('welcome_back')}}");
        @endif

        @if (session('success'))
          toastr.success("{{session('success')}}");
        @endif

        @if (session('delete_message'))
          toastr.error("{{session('delete_message')}}");
        @endif

        @if (session('success_image'))
          toastr.success("{{session('success_image')}}");
        @endif

        @if (session('error_image'))
          toastr.error("{{session('error_image')}}");
        @endif

        @if ($errors->has('image_reference')) 
          toastr.error("{{$errors->first('image_reference')}}");
        @endif
</script>



</body>
</html>