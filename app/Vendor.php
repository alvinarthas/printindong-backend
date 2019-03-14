<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        $vendor = Vendor::join('vendor_service','vendors.id','=','vendor_service.vendor_id')->join('kota','kota.id','=','vendors.kota')->join('jenis_service','jenis_service.id','=','vendor_service.jenis_service_id')->join('service','service.id','=','jenis_service.service_id');
        if($rating <> ''){ 
            $vendor->join('transaksi','vendors.id','=','transaksi.vendor_id')->join('rating','rating.trx_id','=','transaksi.id');
        }
        
        // foreach($jenis_service as $sev){
        //     $vendor->Where('vendor_service.jenis_service_id','like',$sev);
        // }
        
        $vendor->whereIn('vendor_service.jenis_service_id',$jenis_service);
        
        if($harga1 <> '' && $harga2 <> ''){
            $vendor->whereBetween('vendor_service.harga',[$harga1,$harga2]);
        }

        if($kota <> ''){
            $vendor->where('vendors.kota',$kota);
        }

        // if(is_array($kota)){
        //     foreach($kota as $kot){
        //         $vendor->orWhere('vendors.kota',$kot);
        //     }
        // }

        if($rating <> ''){
            $vendor->havingRaw(DB::raw('(SUM(rating.nilai) / COUNT(rating.value)) BETWEEN '.$rating.' AND '.($rating+0.9).''));

            $vendor->select(DB::raw('vendors.id,vendors.nama,vendors.avatar,kota.nama as kota,(SUM(rating.nilai) / COUNT(rating.nilai)) as rate,vendor_service.harga'))->groupBy('vendors.nama');
        }else{
            $vendor->select(DB::raw('vendors.id,vendors.nama,vendors.avatar,kota.nama as kota,vendor_service.harga,service.nama as service,jenis_service.nama as jenis_service,jenis_service.id as jenis_service_id'))->orderBy('vendors.nama','asc');
        }

        return $vendor->get();
    }

    public static function vendorService($vendor_id,$service,$jenis_service){
        $vendor = Vendor::join('vendor_service','vendors.id','=','vendor_service.vendor_id')->join('jenis_service','jenis_service.id','=','vendor_service.jenis_service_id')->join('service','service.id','=','jenis_service.service_id');

        if(is_array($jenis_service)){
            $vendor->whereIn('vendor_service.jenis_service_id',$jenis_service);
        }else{
            $vendor->where('service.id',$service);
        }

        $vendor->where('vendors.id',$vendor_id);

        $vendor->select(DB::raw('vendors.id,vendors.nama,vendor_service.harga,service.nama as service,jenis_service.nama as jenis_service,jenis_service.id as jenis_service_id, vendor_service.harga, vendor_service.image'))->orderBy('vendors.nama','asc');
        // dd($vendor->toSql(), $vendor->getBindings());
        return $vendor->get();
    }
}