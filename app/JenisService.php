<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisService extends Model
{
    protected $table = 'jenis_service';

    protected $fillable = [
        'service_id','nama','icon'
    ];
}