@extends('layouts.master')
	@section('title')
		Naira Products
	@endsection

	@section('content')
        <style type="text/css">
            .pagination > li > a,
            .pagination > li > span {
                color: green; // use your own color here
            }

            .pagination > .active > a,
            .pagination > .active > a:focus,
            .pagination > .active > a:hover,
            .pagination > .active > span,
            .pagination > .active > span:focus,
            .pagination > .active > span:hover {
                background-color: green;
                border-color: green;
            }        
        </style>
         <center>
                   
        </center> <br>
		<div id="index_content">
    		<div class="row">
    			<div class="col-md-12" style="padding-top: 5%;">
                    <center>
                     
                   <img src="{{asset('images/banner_logo.jpg')}}" class="img img-responsive" style="display: inline; font-weight:bold; width:250px; height: 70px;margin-top:-1%;"> <br> <br>
                </center>
    				<div class="ms s-m-w">
                        
                           
                        <form method="POST" action="/search">
                           
                            <div class="input-group">
                                {{ csrf_field() }}
                                <input type="text" name="search" class="form-control" placeholder="Quick search a product or service">
                                <span class="input-group-btn">
                                <input type="submit" class="btn btn-default" id="discover" value="Search"/>
                                </span>
                            </div> 
                            
                        </form>
    				     
    					<!-- /input-group -->
    					<center class="text-center" style="font-size: 14px; "><span style="color: #d9534f">...discover nigeria authentic products and services place. </span>  <br> <br></center>
    				</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="text-center">
    				<a href="product/add_product" class="btn btn-success btn-md glyphicon glyphicon-plus"> Add Product </a> 
    				<a href="product/add_product" class="btn btn-success btn-md glyphicon glyphicon-plus"> Add Service </a> 
    			</div>
    		</div> <br> <br>
    		
            <div class="row well" >
                
                
                @if(isset($featured_product))
    		         <center>
                        <b>
                            Featured Products and Services
                        </b> <br> <br>
                     </center>
    	    	
               
                <div class="col-lg-8 col-lg-offset-2 col-xs-12">
                    @forelse($featured_product as $product_image)
                        <div class="col-lg-3 col-xs-3">
                                   <a style="cursor: pointer;" href="{{$product_image->link}}" target="_blank">
                                       <img style="width:60px; height:60px;" src="{{asset("product_images/$product_image->image")}}" class="img img-responsive img-rounded">
                                   </a>
                                   <small style="color:#d9534f;">{{$product_image->product_name}}</small>
                                   
                        </div>
                    @empty
                    
                    @endforelse
                  
                   
                    {{-- <div class="col-lg-2 col-xs-3">
                               <img src="{{asset('images/splendy.jpg')}}" class="img img-responsive img-rounded">                 
                                                
                    </div>
                    <div class="col-lg-2 col-xs-3">
                               <img src="{{asset('images/splendy.jpg')}}" class="img img-responsive img-rounded">
                    </div>
                    <div class="col-lg-2 col-xs-3">
                               <img src="{{asset('images/splendy.jpg')}}" class="img img-responsive img-rounded">                 
                    </div> --}}
                
                </div>
                
                @endif
                   
            </div>
                    <center>
                        @if(!empty($featured_product)) {{$featured_product->links() }} @endif
                    </center>
                    <center> <b style="color:#5cb85c;"> Connect with us: </b> </center>            
            <div class="row"> 
                <div class="col-lg-8 col-lg-offset-4 col-xs-8 col-xs-offset-3">
                    <div class="col-lg-2 col-xs-3">
                               <a href="https://www.facebook.com/nairaproducts" target="_blank"> <img src="{{asset('images/f.PNG')}}" style=" height:30px;"  class="img img-responsive img-rounded"> </a>              
                    </div>
                    <div class="col-lg-2 col-xs-3">
                               <a href="https://www.instagram.com/nairaproducts" target="_blank"> <img src="{{asset('images/i.jpg')}}" style=" height:30px;" class="img img-responsive img-rounded"> </a>               
                                                
                    </div>
                    <div class="col-lg-2 col-xs-3">
                             <a href="https://www.twitter.com/nairaproducts" target="_blank">  <img src="{{asset('images/t.png')}}" style=" height:30px;"  class="img img-responsive img-rounded"> </a>
                    </div>
                     {{--  <div class="col-lg-2 col-xs-3">  --}}
                               {{--  <img src="{{asset('images/splendy.jpg')}}" class="img img-responsive img-rounded">                   --}}
                    {{--  </div>   --}}
                </div>
                   
            </div>

		</div>
	@endsection
