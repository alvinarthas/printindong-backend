<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kertas extends Model
{
    protected $table = 'kertas';

    protected $fillable = [
        'nama'
    ];
}