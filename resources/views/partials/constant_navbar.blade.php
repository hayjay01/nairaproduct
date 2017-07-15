<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA=Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/my_css/constant_style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/toastr.min.css') }}"/>


	@yield('styles')
</head>
<body>


	<nav style="background-color: #5cb85c; height: ;" class="navbar navbar-default" role="navigation" id="my_nav" onscroll="scrollChange()">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand det-txt" href="/" style="color: #fff;"><img src="{{asset('images/logo.jpg')}}" class="img img-responsive" style="display: inline; border-radius: 5px; margin-top: -2%; font-weight:bold; width:40px; height: 40px; bottom: 0px;"></a>
			</div>
  		    <form method="post" style="margin-top: 10px;" action="{{url('/search')}}">
  		    {{csrf_field()}}
			<div class="col-lg-6 col-lg-offset-2">
			    <div class="input-group">
			      <input type="text" name="search" class="form-control" placeholder="Do a quick search here for a product with just a minute">
			      <span class="input-group-btn">
			        <input type="submit" value="Search" class="btn btn-default">
			      </span>
			    </div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->
			</form>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="{{url('product/add_product')}}" style="color: #ffffff;">Add a Product</a>
				</li>
					<li class="dropdown">
						@if(Auth::check())
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Hi, {{$firstname}}...<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="{{url('/logout')}}" class="glyphicon" id="navbar_dropdown_link" style="color: #ffffff !important;"> Log-Out</a></li>
							</ul>
						@else
							<a href="#" style="color: #ffffff !important;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"></i> Login<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="{{url('users/login')}}" style="color: #ffffff!important;" class="glyphicon" id="navbar_dropdown_link"> <i class="fa fa-login"></i> Login</a></li>
								<li><a style="color: #ffffff!important;" href="{{url('users/signup')}}" class="glyphicon" id="navbar_dropdown_link"> <i class="fa fa-user"></i> New User</a></li>
							</ul>
						@endif
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

	{{-- <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a> --}}
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-review">
			<div class="modal-dialog" >
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Modal title</h4>
					</div>
					<div class="modal-body">
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-success">Save changes</button>
					</div>
				</div>
			</div>
		</div>




	

@yield('body')
<div>
	<center style="margin-top:9%; color: red;">
		<span>
			(c) NairaProducts.ng 2017 | <span > <a href="http://www.facebook.com/nairaproducts" style="color:#5cb85c;"> <i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="http://www.twiter.com/nairaproducts"  style="color:#5cb85c; margin-left:10px;" > <i class="fa fa-twitter" aria-hidden="true"></i></a> <a  href="https://www.instagram.com/nairaproducts/" style="margin-left:10px; color:#5cb85c;"> <i class="fa fa-instagram" aria-hidden="true"></i> </a> </span>
		</span>
	</center>
</div>
<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
<script src="{{ asset('/js/toastr.min.js') }}"></script>



<script type="text/javascript">
			function readURL(input) {
			            if (input.files && input.files[0]) {
			                var reader = new FileReader();
			                console.log(reader);
			                reader.onload = function (e) {
			                    $('#imgCaption')
			                        .attr('src', e.target.result);
			                };
			                reader.readAsDataURL(input.files[0]);
			            }
			        }
			 //$(".more").click(function(){
			 //   $("#textarea").show();
			 //});
			 
            $("#read_more").click(function() {
                // alert('clicked');
                
                $('html,body').animate({
                    scrollTop: $("#textarea").offset().top},
                    'slow');
            });

            $("textarea").keyup(function(){
            	$(".typing").show();
            	// alert('clicked and typing.......');
            });

            $("textarea").focusout(function(){
            	$(".typing").hide();
            	// alert('clicked and typing.......');
            });
</script>
<script type="text/javascript">
	@if (session('message'))
          toastr.info("{{session('message')}}");
        @endif

        @if (session('welcome_back'))
          toastr.success("{{session('welcome_back')}}");
        @endif

        @if (session('success'))
          toastr.info("{{session('success')}}");
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