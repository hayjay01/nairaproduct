@extends('partials.constant_navbar')
	@section('title')
		NAIJA PRODUCT | Add service
	@endsection
	@section('content')
	    <br> <br> <br> <br>
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4  col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
				<form action="" method="POST" role="form" enctype="multipart/form-data">
				{{csrf_field()}}
					<legend>
						<center>
							 <i class="fa fa-plus" aria-hidden="true"></i> Add Service	
						</center>
					</legend>
				
					<div class="form-group">
						<label for="">Service Name:</label>
						<input type="text" name="service_name" class="form-control" id="" placeholder="Input field"> <br> <br>
						<label for="">Category:</label>
						<select name="service_category" id="input" class="form-control" required="required">
							<option value="">Select Category</option>
							@foreach($service_categories as $service)
								<option value="{{$service->id}}">{{$service->name}}</option>
							@endforeach
						</select> <br> <br>
						<label for="">Description:</label>
						<textarea name="service_description" placeholder="Give brief Description of the service here...." id="input" class="form-control" rows="3" required="required"></textarea> <br> <br>
						<label for="">Upload Pictures:</label>
						<input type="file" placeholder="something" name="service_image" id="input" class="form-control" value="" required="required" pattern="" title="">
					</div>
					<center>
						<button type="submit" class="btn btn-success">Submit</button>
					</center>
				</form>
			</div>			
		</div>
	@endsection