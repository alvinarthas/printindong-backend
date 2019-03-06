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
        if($request->api_key){
            $customer = Customer::where('api_token',$request->api_key)->first();

            if($customer){
                return $next($request);
            }else{
                $statusCode = 500;
                $data = array(
                    'code' => '500',
                    'status' => 'error',
                    'message' => 'Token mismatch',
                );
                return response()->json($data,$statusCode);
            }
        }else{
            $statusCode = 500;
            $data = array(
                'code' => '500',
                'status' => 'error',
                'message' => 'Unauthorized',
            );
            return response()->json($data,$statusCode);
        }
    }
}
