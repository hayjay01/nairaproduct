<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Product;
use App\Service;
use Auth;
use App\User;
use App\Product_categories;
use App\ProductReview;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('*', function ($view)
        {
            if (Auth::user()) {
                return $view->with('firstname', Auth::user()->firstname);
            }else{

            }
        });
        
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
