<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendors';

    protected $fillable = [
        'username','nama','email','password','avatar','api_token'
    ];

    protected $hidden = [
        'password',
    ];
}