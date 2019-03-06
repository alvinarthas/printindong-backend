<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'vendor_id','customer_id','keterangan'
    ];

    public function kurir(){
        return $this->belongsTo('App\Kurir');
    }
}