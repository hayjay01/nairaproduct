<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Product;
use App\ProductReview;

use App\Service;



class UserController extends Controller
{
	public function searchProductOrService(Request $request)
	{
    $perPage = 12;
    $method = $request->isMethod('post');
    switch ($method) {
      case true:
        $keyword = $request->input('search');

        if (!$keyword) {
            return back()->with(['delete_message'=>'Please! type to search']);
        }else{
              // dd($keyword);
                $products = Product::with(['ProductReview'])
                                    ->where('product_name', 'LIKE', "%$keyword%")
                                    ->orWhere('product_description', 'LIKE', "%$keyword%")
                                    ->paginate($perPage);
                  return view('users.search', compact('products'));
        }
        break;
      case false:

                  $products = Product::latest()->with(['ProductReview'])->paginate($perPage);
                  // dd($products);
                  $service = Service::latest()->paginate($perPage);
                 
                  return view('search_result', compact('products', 'service'));
      default:
        break;
    }

		
	}
  

   
    Public function signup(Request $request)
        {
            $method = $request->isMethod('post');
            switch ($method) {
                case 'post':
                        $this->validate($request, [
                            'firstname' => 'required', 
                            'email' => 'required|',
                            'password' => 'required|min:4',
                            'phone' => 'required'
                            // 'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
                        ]);
                $file = $request->file('picture');
               $rand_num = rand(1000000, 10000000);
                                                                                                                                
                $user = new User([
                  'firstname' => $request->input('firstname'),
                  'password' => Hash::make($request->input('password')),
                  'email' => $request->input('email'),
                  'phone' => $request->input('phone'),
                  'picture' => $rand_num.$file->getClientOriginalName()
               
               ]);
               

               // dd($user->picture);exit;
               $file->move("users_image/", $user->picture);
               $user->save();
               Auth::login($user);
                  return redirect('product/add_product')->with(['success'=>'Hello '.ucfirst($user->firstname).', Welcome to NairaProduct Add a Product or review what others said about a product before purchasing that very product.']);
               break;
                case 'get':
                    return view('users.signup');
                    break;
                default:
                    return view('users.signup')->with(['message'=>'Signup to proceed']);
                break;
            }
        } //end of Signup

         public function login(Request $request)
        {
            $method = $request->isMethod('post');
            // dd($method);
            switch ($method) {
                case true:
                        $this->validate($request, [
                            'phone' => 'required|required',
                            'password' => 'required|min:4',
                        ]);
                        $authenticate_phone = Auth::attempt(
                          ['phone' => $request->input('phone') , 'password' => $request->input('password')]
                          );
                        $authenticate_email = Auth::attempt(
                          ['email' => $request->input('phone') , 'password' => $request->input('password')]
                          );
                        if ($authenticate_phone) {
                            return redirect('/search')->with(['success'=>'Welcome back!, '.Auth::user()->firstname.' Add a Product or review what others said about a productbefore purchasing that very product']);
                        }elseif($authenticate_email){
                            return redirect('/search')->with(['success'=>'Welcome back!, '.Auth::user()->firstname.' Add a Product or review what others said about a productbefore purchasing that very product']);
                        }else{
                            return redirect('/users/signup')->with(['delete_message' => 'Hello ' .$request->input('phone').', Seems you don\'t have an account yet, Do a Quick signup to continue!']);            
                        }     
                break;
                case false:
                    return view('/users/login');    
                break;
                default:
                    return view('/users/login');    
                break;
            }
        } //end of login form

        public function logout()
        {
          Auth::logout();
          return view('users/index');
        }

        public function contactUs()
        {
          dd("k");
          return view('users.contact');
        }


}
