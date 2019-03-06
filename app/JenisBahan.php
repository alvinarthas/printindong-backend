<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisBahan extends Model
{
    protected $table = 'jenis_bahan';

    protected $fillable = [
        'nama','jenis_service_id'
    ];
}