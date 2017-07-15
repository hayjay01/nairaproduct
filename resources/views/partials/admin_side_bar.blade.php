<ul style="list-style-type: none; border-right: solid 2px;">
					<li >
						<a href="{{url('/admin')}}" class="grey" > <i class="fa fa-dashboard"></i> Dashboard</a>
					</li>
					<li style="margin-top: 10px;" class="grey">
						<a class="grey" href="{{url('admin/users')}}"> <i class="fa fa-user"></i> Users 
							({{$user_count}})
						</a>
					</li>
					
					<li style="margin-top: 10px;" class="grey">
						<a class="grey" href="#pending_products"> <i class="fa fa-edit"></i> Pending Products ({{$pending_products_num}})</a>
					</li>
					<li style="margin-top: 10px;" class="sidebar_link_color">
						<a class="grey" href="{{url('/admin/products')}}"> <i class="fa fa-book"></i> Active Products ({{$products}})</a>
					</li>
					<li style="margin-top: 10px;" >
						<a class="grey" href="{{url('admin/category')}}"> <i class="fa fa-eye"></i> All Categories ({{$categories}})</a>
					</li>
					{{-- <li style="margin-top: 10px;" >
						<a class="sidebar_link_color" href=""> <i class="fa fa-book"></i> All Reviews ({{$reviews}})</a>
					</li> --}}
					<li style="margin-top: 10px;" >
						<a class="grey" href="/admin/category" data-toggle="modal"  > <i class="fa fa-plus"></i> Create Category</a>
					</li>
					<li style="margin-top: 10px;">
						<a href="{{url('/admin/create')}}" class="grey"> <i class="fa fa-dashboard"></i> Manage Admins</a>
					</li>
				</ul>