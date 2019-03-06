<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendors';

    protected $fillable = [
        'username','nama','email','password','avatar','api_token','kota','status','alamat','hp'
    ];

    protected $hidden = [
        'password',
    ];

    public static function filter($jenis_service,$kota,$harga1,$harga2,$rating){
        $vendor = Vendor::join('vendor_service','vendors.id','=','vendor_service.vendor_id')->join('transaksi','vendors.id','=','transaksi.vendor_id')->join('rating','rating.trx_id','=','transaksi.id')->join('kota','kota.id','=','vendors.kota')->where('vendor_service.jenis_service_id',$jenis_service);

        if($kota <> ''){
            $vendor->where('vendors.kota',$kota);
        }

        if($harga1 <> '' && $harga2 <> ''){
            $vendor->whereBetween('vendor_service.harga',[$harga1,$harga2]);
        }
        if($rating <> ''){
            $vendor->havingRaw(DB::raw('(SUM(rating.nilai) / COUNT(rating.value)) BETWEEN '.$rating.' AND '.($rating+0.9).''));
        }

        $vendor->select(DB::raw('vendors.id,vendors.nama,vendors.avatar,kota.nama as kota,(SUM(rating.nilai) / COUNT(rating.nilai)) as rate,vendor_service.harga'));

        return $vendor->distinct()->get();
    }
}