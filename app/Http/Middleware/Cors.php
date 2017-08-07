<?php

namespace App\Http\Middleware;

use Closure;

class CORS
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
        // Allow requests from sources not hosted on the same origin as the API Server
        header('Access-Control-Allow-Origin: *');

        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin'
        ];

        //Returns the $headers as a list of HTTP verbs & headers supported by the API server
        if($request->getMethod() == "OPTIONS"){
            return Response::make('OK', 200, $headers);
        }

        $response = $next($request);

        //Adds all the aforedefined headers to the response
        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }


        return $response;
    }
}
