<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendorservice extends Model
{
    protected $table = 'vendor_service';

    protected $fillable = [
        'vendor_id','jenis_service_id','harga','image'
    ];
}