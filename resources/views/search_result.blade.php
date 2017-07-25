@extends('partials.constant_navbar')
	@section('content')

	@foreach($products->chunk(3) as $productChuncked)
		<div class="row product_row">
			@foreach($productChuncked as $product)
				<div class="col-xs-10 col-xs-offset-1 col-sm-3 col-md-3 col-lg-3">

					<div class="thumbnail">
						<img data-src="#" alt="" style="">
						<div class="caption">
							<span class="product_name_color">Product Name:</span> {{$product->product_name}}<br>
							<span class="product_name_color">Category: </span> {{$product->productCategory->name}}
							<hr>

							<p>
								<center> 
								 <?php $p_name = str_replace(" ","-",$product->product_name); ?> 
									<a href="{{ route('view', [$p_name, $product->reference] )}}">
										<img class="img img-responsive img-thumbnail" style="height:220px; width:200px"; src="{{asset("products_image/$product->product_image")}}">
									</a>

								</center>
							</p>
							
							<p>
								<center>
									<span> <b class="">Desciprtion</b>:{{ str_limit(strip_tags($product->product_description), 50) }} <br> 
                                        @if (strlen(strip_tags($product->product_description)) > 50)
                                          <a id="link" href="{{ route('view', [$p_name, $product->reference] ) }}" > Read More</a></br>
                                        @endif
                                    </span>
								
									<a href="#modal-review{{$product->id}}" data-toggle="modal" class="btn btn-sm btn-default ">   <i class="fa fa-pencil" aria-hidden="true"> </i> Review </a>
									<a href="#modal-users{{$product->id}}" data-toggle="modal" class="btn btn-sm btn-default"> {{count($product->productReview)}} users reviewed this.</a>
								</center>
							</p>
							
						</div>
					</div>
				</div>



			@endforeach
		</div>

	@endforeach

	@foreach($products as $productUsers)
		<div class="modal fade" id="modal-users{{$productUsers->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<center>
								<h4 class="modal-title"> <img class="img img-responsive img-thumbnail" style="height:40px; width:40px"; src="{{asset("products_image/$productUsers->product_image")}}"> Viewing all users who reviewed: {{$productUsers->product_name}}</h4>

							</center>
						</div>
						<div class="modal-body">
							 <table class="table table-hover ">
					 	<thead>
					 		<tr>
					 			<th>
						 			<center>
						 				Recent Reviews({{count($productUsers->productReview)}})
						 			</center>
					 			</th>
					 		</tr>
					 	</thead>
					 	<tbody>
					 	<?php $num = 1; ?>
					 		@foreach($productUsers->ProductReview as $review)
					 			@if(count($review))
					 				<tr>
					 					<td> {{$num++.". "}} <a href="#" style="color: #d9534f;">{{$review->user->firstname}}:</a> {{$review->body}} 
					 					</td>
					 				</tr>
					 				@else 
					 				       No Review for this Product Yet. Make your own <a href="#">review</a> now
					 			@endif
					 		@endforeach
					 	</tbody>
					 </table>
						</div>
						<div class="modal-footer">
							<center>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</center>
						</div>
					</div>
				</div>
			</div>
	@endforeach
	@if(isset($products))
		<div class="pull-right">
			{{ $products->links() }}
		</div>
	@endif
	@foreach($products as $reviews)

		<div class="modal fade" id="modal-review{{$reviews->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<center>
								<h4 class="modal-title">
									<img class="img img-responsive img-thumbnail" style="height:40px; width:40px"; src="{{asset("products_image/$reviews->product_image")}}"> Review: {{$reviews->product_name}}
								</h4>
							</center>
					</div>
					<div class="modal-body">
							<center>
							<form method="post" action="/product/review/{{$reviews->id}}">
								{{csrf_field()}}
								<div class="form-group" >
									<center>
										<label for="textarea" name="body" class="control-label">Write Review:</label>
									</center>
									<div class="">
										<textarea id="textarea"  name="body" class="form-control" placeholder="Place your review here....." rows="6" required="required"></textarea> 
											@if ($errors->has('body')) <p class="help-block" style="color: red">{{ $errors->first('body') }}</p> @endif
											<p class="help-block typing"  style="color: #d9534f; float: left; ">Typing....</p>
										<br>
										<center>
											<button type="submit" class="btn btn-default">Submit</button>
										</center>
									</div>
								</div>
							</form>
						</center>
					</div>
					
				</div>
			</div>
		</div>
	@endforeach
@endsection