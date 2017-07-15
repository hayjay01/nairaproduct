<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();   
    }   

    public function callback(SocialAccountService $service)
    {
        try{
            $providerUser = \Socialite::driver('facebook')->user(0);
        }catch(Exception $e){
            return $this->redirect();
        }
       
        $user = $service->createOrGetUser($providerUser);

        auth()->login($user);

        return redirect('product/add_product');  
        
    }
}