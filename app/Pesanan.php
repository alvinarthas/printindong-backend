<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $fillable = [
        'trx_id','kurir_id','jenis_service_id','qty','harga','keterangan','status','jenis_bahan_id','ukuran_bahan_id','finishing','document'
    ];

    public static function getPesanan($trx){
        return Pesanan::join('jenis_service','jenis_service.id','=','pesanan.jenis_service_id')->join('service','service.id','=','jenis_service.service_id')->join('jenis_bahan','jenis_bahan.id','=','pesanan.jenis_bahan_id')->join('ukuran_bahan','ukuran_bahan.id','=','pesanan.ukuran_bahan_id')->join('finishing','finishing.id','=','pesanan.finishing')->where('pesanan.trx_id',$trx)->select(DB::raw('pesanan.*,service.nama as service, jenis_service.nama as jenis_service, jenis_bahan.nama as jenis_bahan, ukuran_bahan.nama as ukuran_bahan,finishing.nama as finsihing'))->get();
    }
}