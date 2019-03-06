<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
        'trx_id','methodbayar_id','bank_id','harga','status','max_bayar'
    ];
}