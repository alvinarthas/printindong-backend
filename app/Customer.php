<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'username','nama','email','password','avatar','api_token','alamat','kota','hp','status'
    ];

    protected $hidden = [
        'password',
    ];
}