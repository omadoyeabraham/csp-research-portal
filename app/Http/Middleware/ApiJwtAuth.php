<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use JWTAuth;

/**
* Authenticates API CALLS using Json Web Tokens with tymon/jwtauth
*
*/

class ApiJwtAuth
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
        try{

            $user = JWTAuth::toUser($request->input('token'));

        } catch (Exception $e){

            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){

                return response()->json(['error'=>'Token is Invalid'], 500);

            }else if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){

                 return response()->json(['error'=>'Token is Expired'], 500);

            }else{
                
                return response()->json(['error'=>'Something went wrong while trying to validate the api token sent'], 500);
            }
        }
        return $next($request);
    }
}
