<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Service;
use App\ProductReview;
use App\PendingProduct;
use App\Service_categories;
use App\Product_categories;
use Illuminate\Support\Facades\File;
use Auth;
use App\User;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
	public function index(Request $request)
	{
		$keyword = $request->input('search');
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
        	// dd($products);
        }
        // dd($products);exit;
        return view('search_result', compact('products', 'service'));
	}


    public function product(Request $request)
	    {
	    	$method = $request->isMethod('post');
	    	switch ($method) {
	    		case true:
	    			$this->validate($request, [
	    			    'product_name' => 'required', 
	    			    'product_description' => 'required',
	    			    'product_category' => 'required',
	    			    'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
	    			]);
	    			$rand_num = rand(1000000, 10000000);
	    			$file = $request->file('product_image');
	    			$product = new PendingProduct([
	    				'user_id' => Auth::user()->id,
	    			    'product_name' => $request->input('product_name'),
	    			    'product_description' => $request->input('product_description'),
	    			    'product_category' => $request->input('product_category'),
						'reference' => time() . str_random(7) . uniqid(),
	    				'product_image' => $rand_num.$file->getClientOriginalName()
	    			]);
					// dd($product);
	    			$file->move("products_image/", $product->product_image);
	    			$product->save();
			        Session::flash('flash_message', 'Product successfully added!');
			        return redirect('/search')->with('success', 'Product Added Successfully as it await acceptance from the admin, check back in a Jiffy!');
	    			break;
	    		case false:
	    			if (Auth::check()) {
	    				$product_categories = Product_categories::all();
	    				return view('product.add_product', compact('product_categories'));	
	    			}else{
	    				return redirect('/users/login')->with('success', 'Do a fast login below to add product');
	    			}
	    		default:
		    		
	   			break;
	    	}
	    }
	
	public function each_product($id)
	{
		$product = Product::with('productReview')->findOrFail($id);
		return view('users.each_product', compact('product'));

		 // Post::with( ['comments' => function($c){ //perfectly orking fine! it solves all comments withing a post descending order
   //              $c->latest()->limit(5)->get() ;
   //          } ])->where('status', 'publish');
	}
}
