<?php

namespace App\Http\Middleware;

use Closure;
use App\Customer;

class CustAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->api_key == "bzqb2ixx2z6asqfwilkdauprk6bdlqzqfqkpegfjj5av4mgru881mqomwpyo"){
        }else{
            $statusCode = 500;
            $data = array(
                'code' => '500',
                'status' => 'success',
                'message' => 'Daftar Barang',
                'data' => 'Tidak ditemukan'
            );
            return response()->json($data,$statusCode);
        }
        return $next($request);
    }
}
