@extends('layouts.dashboard')
	@section('no_container')
	<style type="text/css">
		body{

		}
	</style>
		<div class="row">

			<div class="col-lg-2 col-md-2 grey" style="background-color: white;">
				@include('partials.admin_side_bar')
			</div>
			<div class="col-lg-8 col-lg-offset-1" style="border-radius:5px;" >
									
					<h3 style="color:grey;">
							*Pending Products </h3> 
					<div class="pull-right">
					    <form id="search_text" name="form_search" method="POST" action="{{url('/admin/dashboard')}}" class="form-inline">
					     {{csrf_field()}}
					       <div class="form-group">
					         <div class="input-group">
					          <input class="form-control" name="search" placeholder="Search for the product........" type="text">
					          <span class="input-group-btn">
					             <input type="submit" class="btn btn-default"  id="submit_search"  value="Go!"/> 
					          </span>
					        </div>
					      </div>
					    </form>
					</div>
					<br> <br>
											{{$pending_products->links()}}
						<div class="table-responsive" id="pending_products">
					@if(count($pending_products))

							<table class="table table-hover table-bordered">
								<thead>
									<tr class="grey">
										<th>
											<center>
												
											</center>S/N
										</th>
										<th>
											<center>
												Uploaded By
											</center>
										</th>
										<th>
											<center>
												Product Name
											</center>
										</th>
										<th>
											<center>
												Description		
											</center>
										</th>
										<th>
											<center>
												Category
											</center>
										</th>
										<th>
											<center>
												Product Image
											</center>
										</th>
										<th>
											<center>
												Posted At
											</center>
										</th>
										<th>	
											<center> Actions </center>
										</th>
									</tr>
								</thead>
								<tbody>
								<?php $num = 1; ?>
									@foreach($pending_products as $product)
										<tr>
											<td> {{ $num++.". " }} </td>
											<td>{{$product->user->firstname}}</td>
											<td>{{$product->product_name}}</td>
											<td>
												<center>
												{{ str_limit(strip_tags($product->product_description), 5) }} <br> 
			                                    @if (strlen(strip_tags($product->product_description)) > 5)
			                                      <a id="link" class="grey" href="{{url('/product/each_product', $product->id)}}">Read</a> </br>
			                                    @endif
												</center>
											</td>
											<td>
												<center>
													{{$product->productCategory->name}}
												</center>
											</td>
											<td> 
												<center>
													<img class="img img-responsive img-thumbnail" style="height:40px; width:40px"; src="{{asset("products_image/$product->product_image")}}">	
												</center>
											</td>
											<td>
												<center>
													{{$product->created_at->diffForHumans()}}
												</center>
											</td>
											<td>
												<center>
													<a href="{{url('/admin/add/product',$product->id)}}" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></a>
													<a href="#modal-edit{{$product->id}}" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
												<a onclick="ConfirmDelete();" id="a_del" href="{{url('admin/del/pendingProduct', $product->id )}}" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
													
												</center>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							@else
								<h3>NO PENDING PRODUCT YET</h3>
							@endif
						</div>
					
				{{$pending_products->links()}}
			</div>

	@foreach($pending_products as $productUsers)
		<div class="modal fade" id="modal-edit{{$productUsers->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<center>
								<h4 class="modal-title"> <img class="img img-responsive img-thumbnail" style="height:40px; width:40px"; src="{{asset("products_image/$productUsers->product_image")}}"> Product name: {{$productUsers->product_name}}</h4>

							</center>
						</div>
						<div class="modal-body">
							 <table class="table table-hover ">
					 	<thead>
					 		<tr>
					 			<th>
						 			<center>
						 				
						 			</center>
					 			</th>
					 		</tr>
					 	</thead>
					 	<tbody>
					 	<td>
					 	<form method="post" action="{{url('admin/update/product', $productUsers->id)}}">
					 	{{csrf_field()}}
					 		<label>Product name: </label><input type="text" id="input" class="form-control" required="required" name="product_name" value="{{$product->product_name}}"> <br> <br>
					 		<label>Description</label>
					 		<textarea id="input" name="product_description" class="form-control" required="required" placeholder="">
					 			{{$productUsers->product_description}}
					 		</textarea> <br> <br>
					 		<select name="product_category" id="input" class="form-control" required="required">
							{{-- <option value="">Select Category</option> --}}
							@foreach($all_category as $category)
								<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
					 	</td>
					 	</tbody>
					 </table>
						</div>
						<div class="modal-footer">
							<center>
							<button type="submit" class="btn btn-default" >Update</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</center>
						</div>
					</div>
				</div>
			</div>
	@endforeach
@endsection


