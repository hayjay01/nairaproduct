@extends('layouts.dashboard')
	@section('content')
		<div class="row" >
										
			<div class="col-lg-12 col-lg-offset-" >
				@if (session('success'))
			                                <div class="alert alert-success">
			                                    {{ session('success') }}
			                                </div>
			                            @elseif(session('delete_message'))
			                                <div class="alert alert-danger">
			                                   <center>
			                                    {{ session('delete_message')  }} <i class="fa fa-arrow-down" aria-hidden="true"></i>	
			                                  </center>
			                                 </div>
			                            @endif
				<h3 style="color:grey;">
						*Products 
				<div class="pull-right">
				    <form id="search_text" name="form_search" method="POST" action="{{url('admin/search_product')}}" class="form-inline">
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
				</h3> <br> <br>

				@if(count($products))
					{{$products->links()}}
					<div class="table-responsive" id="products">
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
								@foreach($products as $product)
									<tr>
										<td> {{ $num++ }} </td>
										<td>{{$product->user->firstname}}</td>
										<td>{{$product->product_name}}</td>
										<td>
											<center>
											{{ str_limit(strip_tags($product->product_description), 15) }} <br> 
	                                        @if (strlen(strip_tags($product->product_description)) > 15)
	                                          <a id="link" class="sidebar_link_color" href="{{url('/product/each_product', $product->id)}}">...More</a> </br>
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
												{{$product->created_at}}
											</center>
										</td>
										<td>
											<center>
												<a href="" class="btn btn-default btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
												<a onclick="ConfirmDelete();" id="a_del1" href="{{url('admin/del/product', $product->id )}}" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
											</center>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				@else
					<h3>NO ACTIVE PRODUUCT  AVAILABLE</h3>
				@endif
				{{$products->links()}}
			</div>
		</div>
	@endsection