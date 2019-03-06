<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finishing extends Model
{
    protected $table = 'finishing';

    protected $fillable = [
        'nama','ukuran_bahan_id'
    ];
}