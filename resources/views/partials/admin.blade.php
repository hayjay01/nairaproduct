<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/my_css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/toastr.min.css') }}"/>


	@yield('styles')
</head>
<body>

@include('partials.header')

    <div class="page-content">
    	<div class="row">
    		<div class="col-md-offset-2 col-md-5">
	    		@if(count($errors) > 0)
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									@foreach($errors->all() as $error)
										<strong>An error occured while sending request...</strong> {{ $error }} 
									@endforeach
								</div>
				@endif
    			
    		</div>
    	  <div class="col-lg-12">
    	  	@include('partials.message_block')
    	  </div>
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="index.html"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a class="link" href=""><i class="glyphicon glyphicon-book "></i>CATEGORIES</a></li>
                   	<div class="col-lg-offset-3">
                   			@foreach($categories as $category)
								<li><a class="mg_top sub_link" href="{{url('view_request_category/'.$category->id)}}"><i class="glyphicon glyphicon-arrow-right"></i> {{$category->category_name}} </a></li> <br>	
							@endforeach								
						<li style="margin-top: 10px;"><a class="mg_top sub_link" data-toggle="modal" href="#modal_new_category"><i class="glyphicon glyphicon-plus"></i> New Category?</a></li>

                   	</div>
                    
                   	<li><a class="" href=""><i class="glyphicon glyphicon-user"></i>USERS</a></li>
                   	<div class="col-lg-offset-3">
						<li><a class="mg_top sub_link" href=""><i class="fa fa-user-plus"></i> Add New User</a></li> <br>
						<li style="margin-top: 10px;"><a class="sub_link" href="#view_all_user" data-toggle="modal"><i class="fa fa-eye" aria-hidden="true"></i>  View All users</a></li> <br>
						<li style="margin-top: 10px;"><a class="mg_top sub_link" href=""><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                   	</div>

                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="signup.html">Signup</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>
		  <div class="col-md-10">
		  	<div class="row">
		  		<div class="col-md-7">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Recent Requests</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<div>


		  						<table class="table table-striped table-hover">
		  							<thead>
		  								<tr>
		  									<th>S/N</th>
		  									<th>Request Title</th>
		  									<th>Requested At</th>
		  									<th>Accept</th>
		  									<th>Reject</th>
		  								</tr>
		  							</thead>
		  							<tbody>
		  							<?php $num=0; ?>

		  								@foreach($all_request as $each_request)

		  									<?php 
		  										
		  										$img = $each_request->user->user_image ;
		  										// var_dump($img); exit;
		  									?>
											<tr>
												<div class="hoverdiv">
													
												</div> 
												<td>
													<?php 
														echo $num
														+=1;
													?>
												</td>
												<td class="hover" >
													<?php 
														$read_more = strip_tags($each_request->request_title);
															if (strlen($read_more) > 30) {

															    // truncate string
															    $stringCut = substr($read_more, 0, 20);

															    // making sure it ends in a word so assassinate doesn't become ass...
															    $final_request_title = substr($stringCut, 0, strrpos($stringCut, ' ')).'<a href="/view_each_request/'.$each_request->id.'">... More</a>';
															    echo $final_request_title; 
															}else{
																echo $each_request->request_title;
															}
													?>

												</td>

												<td>{{$each_request->created_at->toFormattedDateString()}}</td>
												<td><button type="button" class="btn btn-sm btn-primary">Confirm</button></td>
												<td><button type="button" class="btn btn-sm btn-danger">Decline</button></td>
											</tr>		  									
		  								@endforeach
		  								
		  							</tbody>
		  						</table>
		  					</div>
							<br /><br />
		  				</div>
		  			</div>
		  		</div>

		  		<div class="col-md-5">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title"> <i class="glyphicon glyphicon-pencil"></i> Request Analysis</div>
								
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				
				  			<div class="col-lg-4">
								<span class="my_badge counter">
									<h2>214</h2> <br>
									Accepted Request
								</span>
								
								
				  			</div>

				   			<div class="col-lg-3 ">
				 				<span class="my_badge counter">
				 					<h2>034</h2> <br>

				 					Pending Request

				 				</span>				  				
				   			</div>

				  			<div class="col-lg-3 col-lg-offset-1">
								<span class="my_badge counter">
									<h2>29</h2> <br>
									Declined Request
								</span>				  				
				  			</div>

				  			<div class="row">
									<div class="col-lg-12" style="margin-top: 20px;">
										Pellentesque luctus quam quis consequat vulputate. Sed sit amet diam ipsum. Praesent in pellentesque diam, sit amet dignissim erat.
									</div>
				   			</div>
					  				
								<br /><br />
							</div>
		  				</div>
		  			</div>
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title"> <i class="glyphicon glyphicon-calendar"></i> Monthly Request</div>
								
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				<div class="col-lg-3">
									<li ><a class="glyphicon glyphicon-ok black" href="">January</a></li>
									<li ><a class="glyphicon glyphicon-ok black" href="">February</a></li>
									<li ><a class="glyphicon glyphicon-ok black" href="">March</a></li>
									<br>				  					
				  				</div>

				  				<div class="col-lg-3">
									<li ><a class="glyphicon glyphicon-ok black" href="">April</a></li>
									<li ><a class="glyphicon glyphicon-ok black" href="">May</a></li>
									<li ><a class="glyphicon glyphicon-ok black" href="">June</a></li>
									<br>				  					
				  				</div>

								<div class="col-lg-3">
									<li ><a class="glyphicon glyphicon-ok black" href="">July</a></li>
									<li ><a class="glyphicon glyphicon-ok black" href="">August</a></li>
									<li ><a class="glyphicon glyphicon-ok black" href="">September</a></li>
									<br>				  					
				  				</div>

				  				<div class="col-lg-3">
									<li ><a class="glyphicon glyphicon-ok black" href="">October</a></li>
									<li ><a class="glyphicon glyphicon-ok black" href="">November</a></li>
									<li ><a class="glyphicon glyphicon-ok black" href="">December</a></li>
									<br>				  					
				  				</div>

								<br /><br />
							</div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>

		  {{-- 	<div class="row">
		  		<div class="col-md-12 panel-warning">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">Something cool</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
							<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
						</div>
		  			</div>
		  			<div class="content-box-large box-with-header">
			  			Pellentesque luctus quam quis consequat vulputate. Sed sit amet diam ipsum. Praesent in pellentesque diam, sit amet dignissim erat. Aliquam erat volutpat. Aenean laoreet metus leo, laoreet feugiat enim suscipit quis. Praesent mauris mauris, ornare vitae tincidunt sed, hendrerit eget augue. Nam nec vestibulum nisi, eu dignissim nulla.
						<br /><br />
					</div>
		  		</div>
		  	</div>
 --}}
		  	{{-- <div class="content-box-large">
				Nulla sed sem quis odio hendrerit rutrum ac sed nisl. Nulla sit amet nibh orci. Donec ornare mollis elit quis egestas. Sed euismod mollis accumsan. In dapibus arcu arcu, id condimentum lacus accumsan eget. Vivamus in sapien non nulla ultricies molestie. Fusce volutpat tellus quis mi laoreet accumsan. Nulla nec neque aliquet lorem scelerisque eleifend eu et leo.
				<br /><br />
				Pellentesque id arcu et odio imperdiet laoreet. Nulla sed eros risus. Sed tellus odio, faucibus et odio eu, eleifend aliquet nisl. In porttitor odio pulvinar ligula tempor, bibendum lacinia metus mattis. Donec venenatis, tellus non aliquet lobortis, magna lorem ullamcorper urna, nec posuere metus lacus non tellus. Aenean condimentum, velit ac tincidunt volutpat, dolor metus pulvinar lacus, a commodo massa dolor eget magna. Ut hendrerit lectus sit amet malesuada tincidunt.
				<br /><br />
		  	</div> --}}
		  </div>
		</div>
    </div>
    {{-- modal add new catgory begins here --}}
    <div class="modal fade" id="modal_new_category">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				<h4 class="modal-title">Add New Category</h4>
    			</div>
    			<div class="modal-body">
    					@if(count($errors) > 0)
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								@foreach($errors->all() as $error)
									<strong>An error occured while sending request...</strong> {{ $error }} 
								@endforeach
							</div>
						@endif
					<form action="/add_new_category" method="POST">
									{{ csrf_field() }}
								<div class="form-group">
									<label >Name of Category</label>
									
									<input class="form-control" type="text" name="category_name" >
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Add Now</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
					</form>				
    			</div>
    		</div>
    	</div>
    </div>

    {{-- viewing user modal start --}}

    <div class="modal fade modal-admin" id="view_all_user">
    	<div class="col-lg-8">
    		
    	</div>
    	<div class="modal-dialog modal-lg">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				<h4 class="modal-title">Modal title</h4>
    			</div>
    			<div class="modal-body">
    					<table class="table table-striped table-hover">
		  							<thead>
		  								<tr>
		  									<th>S/N</th>
		  									<th>Email</th>
		  									<th>Username</th>
		  									<th>Department</th>
		  									<th>Gender</th>
		  									<th>Joined</th>

		  								</tr>
		  							</thead>
		  							<tbody>
		  							<?php $num=0; ?>
		  								@foreach($users as $user)
											<tr>
												<div class="hoverdiv">
													
												</div> 
												<td>
													<?php 
														echo $num
														+=1;
													?>
												</td>
												<td class="hover" >
													{{$user->email}}
												</td>
												<td class="hover" >
													{{$user->username}}
												</td>
												<td class="hover" >
													{{$user->department}}
												</td>
												<td class="hover" >
													{{$user->gender}}
												</td>
												<td>{{$each_request->created_at->toFormattedDateString()}}</td>
												<td><button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="left" title="">Set as Admin</button></td>
												<td><button type="button" class="btn btn-sm btn-danger">Delete</button></td>
											</tr>		  									
		  								@endforeach
		  								
		  							</tbody>
		  						</table>
    			</div>
    			<center> {{$users->links()}} </center>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				<button type="button" class="btn btn-primary">Save changes</button>
    			</div>
    		</div>
    	</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2017 <a href='#'>www.requestit.com</a>
            </div>
            
         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
	

<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery.js"></script>

<script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/custom.js') }}"></script>
<script src="{{ asset('/js/toastr.min.js') }}"></script>

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