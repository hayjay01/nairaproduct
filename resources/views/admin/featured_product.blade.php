@extends('layouts.dashboard')
	@section('content')
		<div class="row well">
			<div class="col-lg-4">
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Product  Name</th>
								<th>Description</th>
								<th>Image</th>


							</tr>
						</thead>
						<tbody>
						<?php $num = 1;?>
							@foreach($featured as $product)
								<tr>
									<td>{{$num++}}</td>
									<td>{{$product->product_name}}</td>
									<td>{{$category->product_description}}</td>

								</tr>
							@endforeach
								<hr>

						</tbody>
					</table>
				</div>
			</div>
			<div class="col-lg-4  col-lg-offset-1">
				@if (session('success'))
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
                @endif
				<center>
					<form action=""  method="POST" class="form-horizontal" role="form">
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
								<label for="input" class=" control-label">Description:</label>
								<div class="">
									<textarea type="text" name="product_description" id="input" class="form-control" value="" required="required" title=""> </textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="input" class=" control-label">Image:</label>
								<div class="">
									<textarea type="file" name="product_image" id="input" class="form-control" value="" required="required" title=""> </textarea>
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