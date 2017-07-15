<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'surname', 'firstname', 'password', 'email', 'phone', 'company', 'picture', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function productReview()
    {
        return $this->hasMany('App\ProductReview');
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function role()
    {
        return $this->BelongsTo('App\Role');
    }

}