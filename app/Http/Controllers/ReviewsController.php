<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductReview;
use App\ServiceReview;
use Auth;

class ReviewsController extends Controller
{
    public function productReview(Request $request, $product_id, $product_name)
    {
    	$method = $request->isMethod('post');
    	switch ($method) {
    		case true:
    			$this->validate($request, [
	    			    'body' => 'required', 
	    			]);
                // dd($request->all());
    			$productReview = new ProductReview([
    				'user_id' => Auth::user()->id,
    				'product_id' => $product_id,
    				'body' => $request->input('body')
    				]);
                // dd($productReview);
    			$productReview->save();
    			return back()->with('success', 'Review was successful, you can checkout other products to see what poeple say about them');
    			break;
    		case false:
    			# code...
    			break;
    		
    		default:
    			# code...
    			break;
    	}
    }

}
