<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Service;
use App\Service_categories;
use App\Product_categories;
use Illuminate\Support\Facades\File;
use Auth;
use App\User;
use Illuminate\Support\Facades\Session;



class ServiceController extends Controller
{
     public function index()
		{
			$keyword = $request->get('search');
	        $perPage = 25;

	        if (!empty($keyword)) {
	            $products = Product::where('name', 'LIKE', "%$keyword%")
					->orWhere('description', 'LIKE', "%$keyword%")
					->orWhere('product_category', 'LIKE', "%$keyword%")
					->orWhere('product_description', 'LIKE', "%$keyword%")
					->orWhere('product_image', 'LIKE', "%$keyword%")				
	                ->paginate($perPage);
	        } else {
	            $products = Product::paginate($perPage);
	            $service = Service::paginate($perPage);
	            $service_categories = Service::all();
	        }
	        return view('search_result', compact('products', 'service', 'service_categories'));
		}


    public function service(Request $request)
	  	{
	    	$method = $request->isMethod('post');
	    	switch ($method) {
	    		case true:
	    			$this->validate($request, [
	    			    'service_name' => 'required', 
	    			    'service_description' => 'required',
	    			    'service_category' => 'required',
	    			    'service_image' => 'required'
	    			]);
	    			$rand_num = rand(1000000, 10000000);
	    			$file = $request->file('service_image');
	    			$service = new Service([
	    				'user_id' => Auth::user()->id,
	    			    'service_name' => $request->input('service_name'),
	    			    'service_description' => $request->input('service_description'),
	    			    'service_category' => $request->input('service_category'),
	    				'service_image' => $rand_num.$file->getClientOriginalName()
	    			]);
	    			// dd($service);exit;
	    			$file->move("services_image/", $service->service_image);
	    			$service->save();
			        Session::flash('flash_message', 'Service successfully added!');
			        return redirect('/search');
	    			break;
	    		case false:
    				if (Auth::check()) {
	    				$service_categories = Service_categories::all();
	    				return view('service.add_service', compact('service_categories'));	
	    			}else{
	    				return redirect('/users/login')->with('success', 'Do a fast login below to add service');	
	    			}
	    		default:

	   			break;
	    	}
	    }

}
