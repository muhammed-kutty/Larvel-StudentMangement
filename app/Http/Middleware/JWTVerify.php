<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

use Illuminate\Http\Request;

class JWTVerify
{
 

public function handle(Request $request, Closure $next)
{
    $token = session('jwt_token'); // Get the token from the session

    if (!$token) {
        return redirect()->route('login')->withErrors(['error' => 'Must login First to access this page!!']); // Redirect to login if not authenticated
    }

    try {
        $user = JWTAuth::setToken($token)->authenticate();
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Must login First to access this page!!']); // Redirect if the token is invalid
        }
    }  catch (TokenExpiredException $e) {
        
        return redirect()->route('login')->withErrors(['error' => 'Please Login Your token has expired!!']);

    }catch (JWTException $e) {
        return redirect()->route('login'); // Redirect if there's an issue with the token
    }

    $request->auth = $user; // Attach the user to the request

    return $next($request);
}

}
