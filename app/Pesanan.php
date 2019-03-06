<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $fillable = [
        'trx_id','kurir_id','jenis_service_id','qty','harga','keterangan','status','jenis_bahan_id','ukuran_bahan_id','finishing'
    ];
}