<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Vendor;
use App\Vendorservice;

class VendorController extends Controller
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

    public function register(Request $request){
         // Validate
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:vendors',
            'username' => 'required|string|max:50',
            'password' => 'required|min:8|confirmed',
            'nama' => 'required|string|max:50',
            'count' => 'required',
            'jenis_service[*]' => 'required'
        ]);
        
        // IF Validation fail
        if ($validator->fails()) {

            $statusCode = 500;
            $data = array(
                'code' => '500',
                'status' => 'error',
                'message' => 'Silahkan cek kelengkapan form anda',
                'data' => $validator->errors(),
            );

        }else{
            // validation success
            $vendor = new Vendor(array(
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'nama' => $request->nama,
                'api_token' => str_random(60),
                'kota' => $request->kota,
                'alamat' => $request->alamat,
                'hp' =>$request->hp,
            ));

            // success
            if($vendor->save()){
                for($i=1;$i<=$request->count;$i++){
                    $vendorservice = new Vendorservice(array(
                        'vendor_id' => $vendor->id,
                        'jenis_service_id' =>$request->jenis_service[$i]
                    ));

                    $vendorservice->save();
                }
                // Response
                $statusCode = 200;
                $data = array(
                    'code' => '200',
                    'status' => 'success',
                    'message' => 'Vendor Berhasil dibuat, silahkan cek Email Anda di '.$request->email.' '
                );
            }else{
                $statusCode = 500;
                $data = array(
                    'code' => '500',
                    'status' => 'error',
                    'message' => 'Vendor gagal dibuat',
                );
            }
        }

        // Send Response
        return response()->json($data,$statusCode);
    }

    public function login(Request $request){
            // Validate
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        
        // IF Validation fail
        if ($validator->fails()) {

            $statusCode = 500;
            $data = array(
                'code' => '500',
                'status' => 'error',
                'message' => 'Silahkan cek kelengkapan form anda',
                'data' => $validator->errors(),
            );

        }else{
            $vendor = Vendor::where('email',$request->email)->where('status',0)->first();

            // FOUND
            if($vendor && Hash::check($request->password, $vendor->password)){
                $statusCode = 200;
                $data = array(
                    'code' => '200',
                    'status' => 'success',
                    'message' => 'Data Customer telah ditemukan',
                    'data' => $vendor
                );
            
            // NOT FOUND 
            }else{
                $statusCode = 500;
                $data = array(
                    'code' => '500',
                    'status' => 'error',
                    'message' => 'Data customer tidak ditemukan, username/password anda salah!!!',
                );
            }
        }

        return response()->json($data,$statusCode);
    }

    public function profile(Request $request){
        // Find Customer by ID
        $vendor = Vendor::where('username',$request->username)->first();

        // Found
            if($vendor){
                $statusCode = 200;
                $data = array(
                    'code' => '200',
                    'status' => 'success',
                    'message' => 'Data vendor telah ditemukan',
                    'data' => $vendor
                );
        // Not Found
            }else{
                $statusCode = 500;
                $data = array(
                    'code' => '500',
                    'status' => 'error',
                    'message' => 'Data vendor tidak ditemukan',
                );
            }

        return response()->json($data,$statusCode);
    }

    public function vendor_filter(Request $request){
        $service_id = $request->service_id;
        $jenis_service_id = $request->jenis_service_id;
        $kota = $request->kota;
        $harga1 = $request->harga1;
        $harga2 = $request->harga2;
        $rating = $request->rating;

        $vendor = Vendor::filter($jenis_service,$kota,$harga1,$harga2,$rating);

        $statusCode = 200;
        $data = array(
            'code' => '200',
            'status' => 'success',
            'message' => 'Data vendor telah ditemukan',
            'data' => $vendor
        );

        return response()->json($data,$statusCode);
    }
}
