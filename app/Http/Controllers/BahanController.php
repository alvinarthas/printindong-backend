<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\JenisBahan;
use App\UkuranBahan;
use App\Kota;
use App\Finishing;
use App\Kurir;

class BahanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    public function getKota(){
        // Find Customer by ID
        $kota = Kota::all();

        // Found
            if(count($kota) > 0){
                $statusCode = 200;
                $data = array(
                    'code' => '200',
                    'status' => 'success',
                    'message' => 'Data kota telah ditemukan',
                    'data' => $kota
                );
        // Not Found
            }else{
                $statusCode = 500;
                $data = array(
                    'code' => '500',
                    'status' => 'error',
                    'message' => 'Data kota tidak ditemukan',
                );
            }

        return response()->json($data,$statusCode);
    }

    public function getUkuranBahan(Request $request){
        $jenis_bahan = $request->jenis_bahan_id;

        $ukuran_bahan = UkuranBahan::where('jenis_bahan_id',$jenis_bahan)->get();

        // Found
            if(count($ukuran_bahan) > 0){
                $statusCode = 200;
                $data = array(
                    'code' => '200',
                    'status' => 'success',
                    'message' => 'Data jenis service telah ditemukan',
                    'data' => $ukuran_bahan
                );
        // Not Found
            }else{
                $statusCode = 500;
                $data = array(
                    'code' => '500',
                    'status' => 'error',
                    'message' => 'Data jenis service tidak ditemukan',
                );
            }

        return response()->json($data,$statusCode);
    }

    public function getJenisBahan(Request $request){
        $jenis_service_id = $request->jenis_service_id;

        $jenis_bahan = JenisBahan::where('jenis_service_id',$jenis_service_id)->get();

        // Found
            if(count($jenis_bahan) > 0){
                $statusCode = 200;
                $data = array(
                    'code' => '200',
                    'status' => 'success',
                    'message' => 'Data jenis service telah ditemukan',
                    'data' => $jenis_bahan
                );
        // Not Found
            }else{
                $statusCode = 500;
                $data = array(
                    'code' => '500',
                    'status' => 'error',
                    'message' => 'Data jenis service tidak ditemukan',
                );
            }

        return response()->json($data,$statusCode);
    }

    public function getFinishing(Request $request){
        $jenis_bahan_id = $request->jenis_bahan_id;

        $finishing = Finishing::where('jenis_bahan_id',$jenis_bahan_id)->get();

        // Found
            if(count($finishing) > 0){
                $statusCode = 200;
                $data = array(
                    'code' => '200',
                    'status' => 'success',
                    'message' => 'Data jenis service telah ditemukan',
                    'data' => $finishing
                );
        // Not Found
            }else{
                $statusCode = 500;
                $data = array(
                    'code' => '500',
                    'status' => 'error',
                    'message' => 'Data jenis service tidak ditemukan',
                );
            }

        return response()->json($data,$statusCode);
    }

    public function getKurir(){
        // Find Customer by ID
        $kurir = Kurir::all();

        // Found
            if(count($kurir) > 0){
                $statusCode = 200;
                $data = array(
                    'code' => '200',
                    'status' => 'success',
                    'message' => 'Data kurir telah ditemukan',
                    'data' => $kurir
                );
        // Not Found
            }else{
                $statusCode = 500;
                $data = array(
                    'code' => '500',
                    'status' => 'error',
                    'message' => 'Data kurir tidak ditemukan',
                );
            }

        return response()->json($data,$statusCode);
    }
}
