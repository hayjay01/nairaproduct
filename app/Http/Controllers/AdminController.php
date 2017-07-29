<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Role;
use Hash;
use App\User;
use App\Product;
use App\Product_categories;
use App\ProductReview;
use App\PendingProduct;
use App\FeaturedProduct;


//LASAMI 

//1. Allah humo ini as aluka bi ani ahsadu anaka antalah lailahailaanta alahdu somod aldi lamyalid walayulad walayekunlahu kufwan ahad

//2. Alahumo iniasaluka bianalaka alhamda lailaha ila anta badihu samowati walard yazaljalaliwaikram yahayu yaqoyum


class AdminController extends Controller
{
    public function index()
    {
   		return view('admin.login');
    }

    public function searchPendingProduct(Request $request){

                $search_title = $request->input('search');
                // dd($search_title);

                
                if(!$search_title ){
                    return back()->with(['delete_message'=>'Please! type to search']);
                }else{
                    $products = PendingProduct::latest()->where('product_name', 'LIKE', "%$search_title%")
                                            ->orWhere('product_description', 'LIKE', "%$search_title%")
                                            ->paginate(10);
                    return view('admin.search_pending', compact('products'));
                }
    }

    public function searchProduct(Request $request){

        $search_title = $request->input('search');
                // dd($search_title);
                if(!$search_title ){
                    return back()->with(['delete_message'=>'Please! type to search']);
                }else{
                    $products = Product::latest()->where('product_name', 'LIKE', "%$search_title%")
                                            ->orWhere('product_description', 'LIKE', "%$search_title%")
                                            ->paginate(10);
                    return view('admin.search_product', compact('products'));
                }
    }

     public function signin(Request $request)
    {
         $method = $request->isMethod('post');
            switch ($method) {
                case true:
                        $this->validate($request, [
                            'email' => 'required|required',
                            'password' => 'required|min:4'
                        ]);
                        $authenticate_phone = Auth::attempt(
                          ['phone' => $request->input('phone') , 'password' => $request->input('password')]
                          );
                        $authenticate_email = Auth::attempt(
                          ['email' => $request->input('email') , 'password' => $request->input('password')]
                          );
                        if ($authenticate_phone) {
                            return redirect('admin/dashboard');
                        }elseif($authenticate_email){
                            return redirect('/admin/dashboard');
                        }else{
                            return back()->with(['delete_message' => 'Hello ' .ucfirst($request->input('email')).', looks like your credentials is wrong or you do not have permission for this end!']);            
                        } 
                break;
                case false:
                    if (Auth::check()) {
                        return redirect('admin/dashboard');
                    }
                    return $this->index();
                break;
                default:
                    if (Auth::check()) {
                        return redirect('admin/dashboard');
                    }
                    return $this->index();
                break;
            }
    }

    public function signup(Request $request)
    {
         $method = $request->isMethod('post');
            switch ($method) {
                case true:
                        $this->validate($request, [
                            'firstname' => 'required|min:4',
                            'email' => 'required|unique:users',
                            'phone' => 'required',
                            'password' => 'required|min:4',
                            'confirm_password' => 'required|min:4'
                        ]);
                        $password = $request->input('password');
                        $confirm_password = $request->input('confirm_password');
                        if ($password === $confirm_password) {
                            $role = Role::where('name', 'Admin')->first();
                            $user = new User([
                              'firstname' => $request->input('firstname'),
                              'phone' => $request->input('phone'),
                              'email' => $request->input('email'),
                              'password' => Hash::make($password),
                              ]);
                            $user->role()->associate($role);
                            $user->save();
                            return redirect('admin/dashboard')->with('success', 'You\'ve successfully granted '.$user->firstname.' an admin access!');
                        }else{
                            return redirect('/admin/create')->with('delete_message', 'Password does not match!');
                        }
                break;
                case false:
                    return view('/admin/create');
                break;
                default:
                    return view('/admin/create');
                break;
            }
    }

    public function dashboard()
    {
        $user_count = User::join('roles', 'users.role_id', 'roles.id')
                    ->where('roles.name', 'User')->count();
        $all_category = Product_categories::all();
        $reviews = ProductReview::count();
        $products = Product::count();
        $categories = Product_categories::count();
        $pending_products = PendingProduct::with(['User', 'productCategory'])->paginate(10);
        // dd($all_category);
        $pending_products_num = $pending_products->count();

        // dd($pending_products);

        return view('admin.dashboard', compact('user_count', 'products', 'categories', 'pending_products', 'reviews', 'pending_products_num', 'all_category'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/logout');
    }

    public function product()
    {
        $products = Product::with(['User', 'productCategory', 'productReview'])->paginate(10);
        // dd($products);
        return view('admin.products', compact('products'));
    }

    public function createCategory(Request $request)
    {
        $method = $request->isMethod('post');
        switch ($method) {
            case true:
                    $requestData = $request->all();
                    $category = Product_categories::create($requestData);
                    return back()->with('success', $category->name.' Category was added Successfully!');
                break;
            case false:
                $categories = Product_categories::all();
                // dd($categories);
                return view('admin.category', compact('categories'));
                break;
            default:
                $categories = Product_categories::all();
                return view('admin.category', compact('categories'));
                break;
        }
       
    }

    public function user()
    {
        //dealing with the user alone
       $user_count = User::join('roles', 'users.role_id', 'roles.id')
                    ->where('roles.name', 'User')->count();
        $categories = Product_categories::count();
        $reviews = ProductReview::count();
        $products = Product::count();
        $categories = Product_categories::count();
        $pending_products = Product::with(['User', 'productCategory', 'productReview'])->paginate(10);
        $pending_products_num = $pending_products->count();

        $users = User::join('roles', 'users.role_id', 'roles.id')
                    ->where('roles.name', 'User')->paginate(10);
        // dd($users); exit;
        return view('admin.users', compact( 'users', 'user_count', 'products', 'categories', 'pending_products', 'reviews', 'pending_products_num'));
    }

    public function addProduct($id)
    {
        $product = PendingProduct::findOrFail($id);
        // dd($product);
        $data = [ 
        'user_id' => $product->user_id,
        'product_name' => $product->product_name,
        'product_category' => $product->product_category,
        'product_description' => $product->product_description,
        'product_image' => $product->product_image,
        'created_at' => $product->created_at,
        'updated_at' => $product->updated_at,
		'reference' => $product->reference
        ];


        Product::insert($data);
        $product->delete();        

        return back()->with('success','Product Successfully Published!');
    }

    public function delProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();        
        return back()->with(['delete_message' => 'Product Trashed Successfully!']);
    }

    public function delPendingProduct($id)
    {
        $product = PendingProduct::findOrFail($id);
        $product->delete();        
        return back()->with(['delete_message' => 'Product Trashed Successfully!']);
    }

    public function editProduct($id)
    {
        // $products = Product::all();
        $found_product = PendingProduct::findOrFail($id);
         $categories = Product_categories::count();
        $pending_products = Product::with(['User', 'productCategory', 'productReview'])->paginate(10);
        return view('admin.dashboard.update_product', compact('found_product', 'categories', 'unit_type', 'products'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = PendingProduct::findOrFail($id);
        $data = [ 
        'product_name' =>$request->input('product_name'),
        'product_category' => $request->input('product_category'),
        'product_description' =>$request->input('product_description'),
        ];
        // dd($data);
        // $this->validate($request, $data);
        $product->update($data);
        return back()->with('success', 'Product Updated Successfully! you can now publish');
    }

    public function getFeaturedProduct(Request $request)
    {
        $user_count = User::join('roles', 'users.role_id', 'roles.id')
                    ->where('roles.name', 'User')->count();
        $all_category = Product_categories::all();
        $reviews = ProductReview::count();
        $products = Product::count();
        $categories = Product_categories::count();
        $pending_products = PendingProduct::with(['User', 'productCategory'])->paginate(10);
        // dd($all_category);
        $pending_products_num = $pending_products->count();
        $method = $request->isMethod('post');
        $featured = FeaturedProduct::all();

        return view('admin.featured_product', compact('featured', 'user_count', 'all_category', 'reviews', 'products', 'categories', 'pending_products', 'pending_products_num'));
           
        
    }

    public function addFeaturedProduct(Request $request)
    {
        # code...
         $rand_num = rand(1000000, 10000000);
                $file = $request->file('product_image');
                // dd($file);
                $img_ext = ['.jpg', '.jpeg', '.PNG', '.png'];
                $requestData['image'] =  $rand_num.$file->getClientOriginalName();

                $filename = str_replace($img_ext, '', $requestData['image']);
                // dd($filename);
                $store  = \Storage::disk('custom')->put($filename, $request->file('product_image'));
                // dd($store);
                // $requestData = $request->all();
                    $requestData = new FeaturedProduct([
                        // 'user_id' => Auth::user()->id,
                        'product_name' => $request->input('product_name'),
                        'link' => $request->link,
                        'image' => $store
                    ]);
                // dd($requestData);
                $requestData->save();
                return back()->with('success', 'New Featured Product Added.');

                // dd($requ/estData);
    }

    public function deleteFeaturedProduct($id)
    {
        $product = FeaturedProduct::findOrFail($id);
        $product->delete();        
        return back()->with(['delete_message' => 'Product Trashed Successfully!']);
        // $dd($product);
    }

}
