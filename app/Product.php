<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'description', 'catagory','price','quntity','image_1',
    ];

   
}
