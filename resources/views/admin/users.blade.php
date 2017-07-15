@extends('layouts.dashboard')
	@section('no_container')
		<div class="row">
			<div class="col-lg-3 col-md-2 sidebar_link_color" style="background-color: white;">
					@include('partials.admin_side_bar')
			</div>
			{{$users->links()}}
			<div class="col-lg-9">
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th>
									<center>
										S/N
									</center>
								</th>
								<th>
									<center>
										Full Name
									</center>
								</th>
								<th>
									<center>
										Email
									</center>
								</th>
								<th> 
									<center>
									Phone
									</center>
								</th>
							</tr>
						</thead>
						<tbody>
						<?php $num=1; ?>
							@if(count($users))
								@foreach($users as $user)
									<tr>
										<td>
											<center>
												{{$num++}}
											</center>
										</td>
										<td>
											<center>
												{{$user->surname." ".$user->firstname}}
											</center>
										</td>
										<td>
											<center>
												{{$user->email}}
											</center>
										</td>
										<td>
											<center>
												{{$user->phone}}
											</center>
										</td>
									</tr>
								@endforeach
							@else
								<tr>
									<center>
										<td>
											{{"No Registered User Yet."}}
										</td>
									</center>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
			{{$users->links()}}
			

		</div>
	@endsection