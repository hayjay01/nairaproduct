@extends('partials.constant_navbar')
	@section('content')
		<div class="row">
			<center>
				<div class="form-group">
					<span class="label">  <h3 style="color: #222;"> Product Name: {{$product->product_name}} </h3>  </span>				
				</div>
			</center>
		</div>
		<div class="row" id="main_body">
			<div class="">

				@if (session('success'))
					@include('partials.message_block')
                @endif
				<div class="col-lg-4 col-xs-12 col-sm-6 ">
						<div class="thumbnail">
						<img data-src="#" alt="" style="">
						<div class="caption">
							<span class="product_name_color">Product Name:</span> {{$product->product_name}}<br>
							<span class="product_name_color">Category: </span> {{$product->productCategory->name}}
							<hr>

							<p>
							
								<center> 
									
									<img class="img img-responsive img-thumbnail" style="height:220px; width:200px"; src="{{asset("products_image/$product->product_image")}}">

								</center>
							</p>
							
							<p>

								<center>
									<span> <b class="">Desciprtion</b>:{{$product->product_description}} 
                                    </span> </br>
									<a href="#textarea" class="btn btn-default" >Review</a>

								
									
									<a href="" class="btn btn-sm btn-default"> {{count($product->ProductReview)}} users reviewed this</a>
								</center>
							</p>
							
						</div>
				</div>
						
				</div>
					<div class="col-sm-6"  >
						<center>
						 <?php $p_name = str_replace(" ","-",$product->product_name); ?> 
							<form method="post" action="{{route('review', [$p_name, $product->id])}}">
								{{csrf_field()}}
								<div class="form-group">
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
				
			<div style="background-color: whitesmoke;" id="recent_review" class="col-lg-3 col-xs-12 col-sm-12">
				
				 <table class="table table-hover ">
				 	<thead>
				 		<tr>
				 			<th>
					 			<center>
					 				Recent Reviews({{count($product->productReview)}})
					 			</center>
				 			</th>
				 		</tr>
				 	</thead>
				 	<tbody>
				 	<?php $num = 1; ?>
				 		@foreach($product->productReview as $review)
				 			@if(count($review))
				 				<tr>
				 					<td> {{$num++.". "}} <a href="#">{{$review->user->firstname}}:</a> {{$review->body}} 
				 					</td>
				 				</tr>
				 			@else  
				 				<tr>
				 					<td>
				 					No Review for this Product Yet. Make your own <a href="recent_review">review</a> now
				 					</td>
				 				</tr> 
				 			@endif
				 		@endforeach
				 	</tbody>
				 </table>

			</div>
			
		</div>

		
	    
	@endsection