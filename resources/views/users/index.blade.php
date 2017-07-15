@extends('layouts.master')
	@section('title')
		Naira Products
	@endsection

	@section('content')
         <center>
                   
        </center> <br>
		<div id="index_content">
    		<div class="row">
    			<div class="col-md-12 p-t-7">
                    <center>
                     
                   <img src="{{asset('images/banner_logo.jpg')}}" class="img img-responsive" style="display: inline; font-weight:bold; width:250px; height: 70px;margin-top:-1%;"> <br> <br>
                </center>
    				<div class="ms s-m-w">
                        
    					<div class="input-group">
                           

    				     <input type="text" class="form-control" placeholder="Quick search a product or service">
    				     <span class="input-group-btn">
    				       <a href="/search" class="btn btn-default" id="discover" type="button">Search</a>
    				     </span>
    					</div> <br>
    					<!-- /input-group -->
    					<center class="text-center" style="font-size: 20px; "><span style="color: #d9534f">...discover nigeria authentic products and services place. </span>  <br> <br></center>
    				</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="text-center">
    				<a href="product/add_product" class="btn btn-success btn-md glyphicon glyphicon-plus"> Add Product </a> 
    				<a href="product/add_product" class="btn btn-success btn-md glyphicon glyphicon-plus"> Add Service </a> 
    			</div>
    		</div>
            <div class="row">
                <br> <br>
                <center>
                    <b>
                        FEATURED PRODUCTS AND SERVICES
                    </b> <br> <br>
                </center>
                <div class="col-lg-8 col-lg-offset-3 col-xs-12">
                    
                    <div class="col-lg-2 col-xs-3">
                               <img src="{{asset('images/splendy.jpg')}}" class="img img-responsive img-rounded">                 
                    </div>
                    <div class="col-lg-2 col-xs-3">
                               <img src="{{asset('images/splendy.jpg')}}" class="img img-responsive img-rounded">                 
                                                
                    </div>
                    <div class="col-lg-2 col-xs-3">
                               <img src="{{asset('images/splendy.jpg')}}" class="img img-responsive img-rounded">
                    </div>
                    <div class="col-lg-2 col-xs-3">
                               <img src="{{asset('images/splendy.jpg')}}" class="img img-responsive img-rounded">                 
                    </div>
                </div> <br/>
                   
            </div>
		</div>
	@endsection
