<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_categories extends Model
{
    protected $fillable = ['role_id', 'name', 'description'];
    
    public function product(){
        return $this->hasMany('App\Product');
    }


    public function pending_products(){
        return $this->hasMany('App\PendingProduct');
    }

}
