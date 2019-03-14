<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Transaksi;
use App\Pesanan;

class TransaksiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function storePesanan(Request $request){
        $i=1;
        // Validate
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'vendor_id' => 'required',
            'jenis_service_id[*]' => 'required',
            'qty[*]' => 'required',
            'harga[*]' => 'required',
            'count' => 'required',
            'document[*]' => 'required'
        ]);
        
        if ($validator->fails()) {
            $statusCode = 500;
            $data = array(
                'code' => '500',
                'status' => 'error',
                'message' => 'Silahkan cek kelengkapan form anda',
                'data' => $validator->errors(),
            );
        // Validation success
        }else{
            // INSERT NEW TRX
            $transaksi = new Transaksi(array(
                'customer_id' => $request->customer_id,
                'vendor_id' => $request->vendor_id,
                'kurir_id' => $request->kurir_id,
            ));
            try{
                $transaksi->save();

                // INSERT PESANAN
                for($i=0;$i<$request->count;$i++){
                    $pesanan = new Pesanan(array(
                        'trx_id' => $transaksi->id,
                        'jenis_service_id' => $request->jenis_service_id[$i],
                        'jenis_bahan_id' => $request->jenis_bahan_id[$i],
                        'ukuran_bahan_id' => $request->ukuran_bahan_id[$i],
                        'finishing' => $request->finishing[$i],
                        'qty' => $request->qty[$i],
                        'harga' => $request->harga[$i],
                        'keterangan' => $request->keterangan[$i],
                        'document' => $request->document[$i],
                        'status' => 1,
                    ));

                    $pesanan->save();
                }

                // response
                $statusCode = 200;
                $data = array(
                    'code' => '200',
                    'status' => 'success',
                    'message' => 'Transaksi Berhasil dicatat',
                    'data' => $transaksi->id
                );
            }catch(\Exception $e){
                $statusCode = 500;
                $data = array(
                    'code' => '500',
                    'status ' => 'error',
                    'message' => $e,
                );
            }
        }
        // Send Response
        return response()->json($data,$statusCode);
    }

    public function updateTrxKurir(Request $request){
        // Validate
        $validator = Validator::make($request->all(), [
            'kurir_id' => 'required|integer',
            'trx_id' => 'required|integer'
        ]);
        if ($validator->fails()) {
            // IF Validation fail

            $statusCode = 500;
            $data = array(
                'code' => '500',
                'status' => 'error',
                'message' => 'Silahkan cek kelengkapan form anda',
                'data' => $validator->errors(),
            );

        }else{
            $transaksi = Transaksi::where('id',$request->trx_id)->first();
            if($transaksi){

                $transaksi->kurir_id = $request->kurir_id;

                try{
                    $transaksi->save();
                    // Response

                    $statusCode = 200;
                    $data = array(
                        'code' => '200',
                        'status' => 'success',
                        'message' => 'Update Kurir Berhasil'
                    );
                }catch(\Exception $e){
                    $statusCode = 500;
                    $data = array(
                        'code' => '500',
                        'status' => 'error',
                        'message' => 'Terjadi kesalahan, silahkan dicek kembali',
                    );
                }
            }else{
                $statusCode = 500;
                $data = array(
                    'code' => '500',
                    'status' => 'error',
                    'message' => 'Transaksi tidak ditemukan'
                );
            }
        }

        // Send Response
        return response()->json($data,$statusCode);
    }

    public function getPesanan(Request $request){
        $trx_id = $request->trx_id;
        $pesanan = Pesanan::getPesanan($trx_id);

        if($pesanan){
            $statusCode = 200;
            $data = array(
                'code' => '200',
                'status' => 'success',
                'message' => 'Data Pesanan ',
                'data' => $pesanan,
            );
        }else{
            $statusCode = 500;
            $data = array(
                'code' => '500',
                'status' => 'error',
                'message' => 'Komentar tidak ditemukan'
            );
        }
        // Send Response
        return response()->json($data,$statusCode);
    }

    public function updatePesanan(Request $request){
        // Validate
        $validator = Validator::make($request->all(), [
            'pesanan_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            // IF Validation fail

            $statusCode = 500;
            $data = array(
                'code' => '500',
                'status' => 'error',
                'message' => 'Silahkan cek kelengkapan form anda',
                'data' => $validator->errors(),
            );

        }else{
            $pesanan = Pesanan::where('id',$request->pesanan_id)->first();

            try{
                $pesanan->update($request->all());
                    // Response

                    $statusCode = 200;
                    $data = array(
                        'code' => '200',
                        'status' => 'success',
                        'message' => 'Update Pesanan Berhasil'
                    );

            }catch(\Exception $e){
                $statusCode = 500;
                $data = array(
                    'code' => '500',
                    'status' => 'error',
                    'message' => $e
                );
            }
        }

        // Send Response
        return response()->json($data,$statusCode);
    }

    public function totalTransaksi(Request $request){
        $trx_id = $request->trx_id;

        $transaksi = Transaksi::where('id',$trx_id)->first();

        $pesanans = Pesanan::where('trx_id',$trx_id)->get();
        
        $harga = 0;
        foreach($pesanans as $pesanan){
            $harga += ($pesanan->harga*$pesanan->qty);
        }

        $trx = collect();
        $trx->put('subtotal',$harga);
        if($transaksi->kurir_id == NULL || $transaksi->kurir_id == ''){
            $harga_kurir = 0;
        }else{
            $harga_kurir = $transaksi->kurir->harga;
        }
        $trx->put('biaya_kirim',$harga_kurir);
        $total = $harga+$harga_kurir;
        $trx->put('total_biaya',$total);

        $statusCode = 200;
        $data = array(
            'code' => '200',
            'status' => 'success',
            'message' => 'Daftar Nego Harga',
            'data' => $trx
        );
        return response()->json($data,$statusCode);
    }
}
