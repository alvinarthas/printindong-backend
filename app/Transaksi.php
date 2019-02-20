<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'vendor_id','customer_id','jenis_service_id','qty','kertas_id','keterangan'
    ];
}