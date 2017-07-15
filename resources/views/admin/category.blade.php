@extends('layouts.dashboard')
	@section('content')
		<div class="row well">
			<div class="col-lg-4">
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th>S/N</th>
								<th>Category Name</th>
								<th>Category Description</th>

							</tr>
						</thead>
						<tbody>
						<?php $num = 1;?>
							@foreach($categories as $category)
								<tr>
									<td>{{$num++}}</td>
									<td>{{$category->name}}</td>
									<td>{{$category->description}}</td>

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
							<div class="form-group">
								<center>
									<legend>Add New Category</legend>
								</center>
							</div>
							<div class="form-group">
								<label for="input" class="control-label">Category name:</label>
								<div class="">
									<input type="text" name="name" id="input" class="form-control" value="" required="required" title="">
								</div>
							</div>
							<div class="form-group">
								<label for="input" class=" control-label">Category description:</label>
								<div class="">
									<textarea type="text" name="description" id="input" class="form-control" value="" required="required" title=""> </textarea>
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