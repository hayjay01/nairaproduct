@extends('layouts.dashboard')
	@section('content')
		<div class="row well">
			<div class="col-lg-6">
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th><center>
									S/N
								</center></th>
								<th> <center>
									Product name
								</center></th>
								<th>
									Product image
								</th>
								<th>
									<center>
										Product Url
									</center>
								</th>
								{{-- <th>Edit</th> --}}
								<th>Delete</th>




							</tr>
						</thead>
						<tbody>
						<?php $num = 1;?>
							@foreach($featured as $product)
								<tr>
									<td>{{$num++}}</td>
									<td> <a href="{{$product->link}}" style="color: #222;" target="_blank">{{$product->product_name}}</a> </td>
									<td> <img  width="50px;" src="{{asset("product_images/$product->image")}}">  </td>
									<td> <a href="{{$product->link}}" target="_blank">{{$product->link}}</a> </td>
									{{-- <td> <a href=""><span style="color: #5cb85c" class="fa fa-edit">  </span> </a></td> --}}
									
									<td> <a onclick="ConfirmDelete();" id="a_del" href="{{url('admin/delete/featured-product', $product->id)}}"><span style="color: #5cb85c;" class="fa fa-trash">  </span> </a></td>


								</tr>
							@endforeach
								<hr>

						</tbody>
					</table>
				</div>
			</div>
			<div class="col-lg-4  col-lg-offset-1">
				{{-- @if (session('success'))
                                <div class="alert alert-success">
                                    <center>
                                    	{{ session('success') }} <i class="fa fa-ok" aria-hidden="true"></i>
                                    </center>
                                </div>
                @elseif(session('delete_message'))
                                <div class="alert alert-danger">
                                   <center>
                                    {{ session('delete_message')  }} <i class="fa fa-arrow-down" aria-hidden="true"></i>	
                                  </center>
                                 </div>
                @endif --}}
				<center>
					<form action="{{url('admin/add/featured-product')}}"  method="POST" enctype='multipart/form-data' class="form-horizontal" role="form">
							{{csrf_field()}}
							<div class="form-group">
								<center>
									<legend>New FeaturedProduct</legend>
								</center>
							</div>
							<div class="form-group">
								<label for="input" class="control-label">Product name:</label>
								<div class="">
									<input type="text" name="product_name" id="input" class="form-control" value="" required="required" title="">
								</div>
							</div>
							<div class="form-group">
								<label for="input" class=" control-label">Image:</label>
								<div class="">
									<input type="file" placeholder="something" onchange="readURL(this);" name="product_image" id="input" class="form-control" value="" required="required">
								</div>
							</div>
							<div class="form-group">
								<label for="input" class=" control-label">Link to the Product:</label>
								<div class="">
									<input type="url" placeholder="product link goes here.. informat: https://www.nairaproduct.ng/splendy" name="link" id="input" class="form-control" value="" required="required">
								</div>
							</div>


							<div class="form-group">
								<div class="">
									<button type="submit" class="btn btn-default">Submit</button>
								</div>
							</div>
					</form>	
				</center>
				
			</div>
		</div>
	@endsection