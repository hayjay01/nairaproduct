<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA=Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/toastr.min.css') }}"/>
	
	{{-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/my_css/style.css') }}"> --}}

	@yield('styles')
</head>
<body>
<style type="text/css">
		body{
			overflow-x: hidden;
		}
		.sidebar_link_color{
			color: #5cb85c;
		}
		.grey{
			color: grey;
		}

		.red{
			color: lightcoral;
		}
		
	</style>
<div id="app">

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
				<a class="navbar-brand det-txt" href="{{url('/admin')}}"><img src="{{asset('images/logo.jpg')}}" class="img img-responsive" style="display: inline; font-weight:bold; width:45px; height: 45px;margin-top:-25%;"></a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				{{-- <form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form> --}}
				@if(Auth::check())
					<ul class="nav navbar-nav navbar-right">
						<li><a href="{{url('/admin/logout')}}">Log-out <i class="fa fa-lock" aria-hidden="true"></i></a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Notifications <i class="fa fa-bell" aria-hidden="true"></i> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								{{-- <li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li><a href="#">Separated link</a></li> --}}
							</ul>
						</li>
					</ul>
				@else
					
				@endif
				
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
</div>
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
<script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/toastr.min.js') }}"></script>

<script type="text/javascript">
	 function ConfirmDelete()
              {
              var x = confirm("Are you sure you want to delete?");
              if (x)
                return true;
              else
                return false;
              }
              $("a#a_del").click(function(){
               return ConfirmDelete();
              });
              $("button#a_del").click(function(){
               return ConfirmDelete();
              });
	// $('#createCategory').click(function(e){
	// 				e.preventDefault();
	// 				$("#newCategory").serialize();
	// 				alert('clicked');
 //                    var name = $("#name").val();
 //                    var description = $("#description").val();
 //                    alert(name);
 //                    alert(description);
 //                    $.ajax({
 //                            url: "/admin/category",
 //                            type: "POST",
 //                            data: {data:category}
 //                            success: function(data){
 //                            	console.log(data);
 //                            	alert('success');
 //                            },error:function(){
 //                                alert("Please pick a valid payment status");
 //                            }
 //                    });

 //                });
</script>

<script type="text/javascript">
	@if (session('middleware'))
          toastr.error("{{session('middleware')}}");
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