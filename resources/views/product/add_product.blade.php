@extends('partials.constant_navbar')
	@section('title')
		NAIJA PRODUCT | Add product
	@endsection
	@section('content')
	    <style type="text/css">
			img{
			  max-width:180px;
			}
			/*input[type=file]{
			padding:10px;
			background:#2d2d2d;}*/
		</style>
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4 nav_top  col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
				<form action="/product/add_product" method="POST" role="form" enctype='multipart/form-data'>
					{{csrf_field()}}
					<legend>
						<center>
							 <i class="fa fa-plus" aria-hidden="true"></i> Add a Product	
						</center>
						
					</legend>
					<div class="form-group">
						<label for="">Product Name:</label>
						<input type="text" name="product_name" class="form-control" id="" placeholder="Input field">
							@if ($errors->has('product_name')) <br> <br> <p class="help-block" style="color: red">{{ $errors->first('product_name') }}</p> @endif <br> <br>

						<label for="">Category:</label>
						<select name="product_category" id="input" class="form-control" required="required">
							<option value="">Select Category</option>
							@foreach($product_categories as $product)
								<option value="{{$product->id}}">{{$product->name}}</option>
							@endforeach
						</select>
							@if ($errors->has('product_category'))<p class="help-block" style="color: red">{{ $errors->first('product_category') }}</p> @endif <br> <br>

						<label for="">Description:</label>
						<textarea name="product_description" placeholder="Product description here...." id="input" class="form-control" rows="3" required="required"></textarea>
							@if ($errors->has('product_description'))<p class="help-block" style="color: red">{{ $errors->first('product_description') }}</p> @endif <br> <br>

						<label for="">Upload Pictures:</label>
						<input type="file" placeholder="something" onchange="readURL(this);" name="product_image" id="input" class="form-control" value="" required="required">
							@if ($errors->has('product_image')) <p class="help-block" style="color: red">{{ $errors->first('product_image') }}</p> @endif <br> <br>
							<center>
								<img id="imgCaption" class="img img-rounded img-responsive" style="width:120px; height:120px;" src="" alt="No Product Image Selected Yet" />
							</center>
					</div>
					<center>
						<button type="submit" class="btn btn-success">Submit</button>
					</center>
				</form>
			</div>			
		</div>
	@endsection