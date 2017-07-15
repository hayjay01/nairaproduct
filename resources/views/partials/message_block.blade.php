@if(Session::has('message'))
		<div class="col-md-4 col-md-offset-4">
			<div class="alert alert-success alert-dismissable">
          <i class="fa fa-coffee"></i>
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
				<strong>Success: </strong>{{Session::get('message')}}
			</div>
		</div>
@elseif (Session::has('error_message'))
		<div class="col-md-4 col-md-offset-4">
			<div class="alert alert-danger alert-dismissable">
          <i class="fa fa-coffee"></i>
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
				<strong>Ooops!: </strong>{{Session::get('error_message')}}
			</div>
		</div>
@elseif (Session::has('signup_error_message'))
		<div class="col-lg-4">
			<div class="alert alert-danger alert-dismissable">
          <i class="fa fa-coffee"></i>
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
				<strong>Ooops!: </strong>{{Session::get('signup_error_message')}}
			</div>
		</div>

       
@endif

 <div class="alert alert-success">
        	<center>
        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<strong>Reviewed:</strong> Review was successful, You can visit the <a href="#recent_review" class="link_color">Recent review</a> section to view your review.
        	</center>
       	</div>
