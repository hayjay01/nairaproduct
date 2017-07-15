@extends('partials.constant_navbar')
	@section('content')
		<center>
			<div class="form-group">
				<span class="label"> <h3> Product Name </h3> </span>				
			</div>
		</center>
		<div class="row">

			
			<div class="col-lg-4">
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
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
                                    </span>
								
									<a type="button" href="" class="btn btn-sm btn-default ">   <i class="fa fa-pencil" aria-hidden="true"> </i> Review </a>
									<a type="button" href="" class="btn btn-sm btn-default"> 12 users reviewed this</a>
								</center>
							</p>
							
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
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
                                    </span>
								
									<a type="button" href="" class="btn btn-sm btn-default ">   <i class="fa fa-pencil" aria-hidden="true"> </i> Review </a>
									<a type="button" href="" class="btn btn-sm btn-default"> 12 users reviewed this</a>
								</center>
							</p>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection