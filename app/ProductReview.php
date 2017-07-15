<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = ['product_id', 'user_id', 'body'];

    public function product()
    {
    	return $this->belongsTo('App\Product'); //take productid in productReview table aas foreign key to use it and look for in products table based on whether it finds the id or not
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

}

