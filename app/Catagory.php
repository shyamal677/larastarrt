<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    protected $table = 'catagories';

    protected $fillable = [
        'catagory_name', 'description',
    ];
}
