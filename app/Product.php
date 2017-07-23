<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id', 'product_name', 'product_category', 'product_description', 'product_image', 'reference'
    ];
    
    public function productReview()
    {
    	return $this->hasMany('App\ProductReview')->latest();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function productCategory(){
        return $this->belongsTo('App\Product_categories', 'product_category');
    }

}
