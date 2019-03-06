<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;
use App\JenisService;

class ServiceController extends Controller
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

    public function getService(){
        // Find Customer by ID
        $service = Service::all();

        // Found
            if(count($service) > 0){
                $statusCode = 200;
                $data = array(
                    'code' => '200',
                    'status' => 'success',
                    'message' => 'Data service telah ditemukan',
                    'data' => $service
                );
        // Not Found
            }else{
                $statusCode = 500;
                $data = array(
                    'code' => '500',
                    'status' => 'error',
                    'message' => 'Data service tidak ditemukan',
                );
            }

        return response()->json($data,$statusCode);
    }

    public function getJenis(Request $request){
        $service = $request->service_id;

        $jenis = JenisService::where('service_id',$service)->get();

        // Found
            if(count($jenis) > 0){
                $statusCode = 200;
                $data = array(
                    'code' => '200',
                    'status' => 'success',
                    'message' => 'Data jenis service telah ditemukan',
                    'data' => $jenis
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
}
