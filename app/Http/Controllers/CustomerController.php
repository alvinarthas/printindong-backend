<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Customer;

class CustomerController extends Controller
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
    public function index(){
        return "sialan";
    }
    public function register(Request $request){
         // Validate
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:customers',
            'username' => 'required|string|max:50',
            'password' => 'required|min:8|confirmed',
            'nama' => 'required|string|max:50',
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
            $customer = new Customer(array(
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'nama' => $request->nama,
                'api_token' => str_random(60),
                'alamat' => $request->alamat,
                'kota' => $request->kota,
                'hp' => $request->hp,
            ));

            // success
            if($customer->save()){
                // Response
                $statusCode = 200;
                $data = array(
                    'code' => '200',
                    'status' => 'success',
                    'message' => 'Customer Berhasil dibuat, silahkan cek Email Anda di '.$request->email.' '
                );
            }else{
                $statusCode = 500;
                $data = array(
                    'code' => '500',
                    'status' => 'error',
                    'message' => 'Customer gagal dibuat',
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
            $customer = Customer::where('email',$request->email)->where('status',0)->first();

            // FOUND
            if($customer && Hash::check($request->password, $customer->password)){
                $statusCode = 200;
                $data = array(
                    'code' => '200',
                    'status' => 'success',
                    'message' => 'Data Customer telah ditemukan',
                    'data' => $customer
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
        $customer = Customer::where('username',$request->username)->first();

        // Found
            if($customer){
                $statusCode = 200;
                $data = array(
                    'code' => '200',
                    'status' => 'success',
                    'message' => 'Data customer telah ditemukan',
                    'data' => $customer
                );
        // Not Found
            }else{
                $statusCode = 500;
                $data = array(
                    'code' => '500',
                    'status' => 'error',
                    'message' => 'Data customer tidak ditemukan',
                );
            }

        return response()->json($data,$statusCode);
    }
}
