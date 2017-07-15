<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'user_id', 'service_name', 'service_category', 'service_description', 'service_image'
    ];
}
