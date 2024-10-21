<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get credentials from request
        $credentials = $request->only('username', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return redirect()->back()->withErrors(['error' => 'Invalid credentials']);
            }
            
            // Retrieve the authenticated user
            $user = User::where('username', $request->username)->first();
            
            if ($user) {
                // Update the token in the database
                $user->token = $token; // Assuming 'token' is the column name in the users table
                $user->save();
            }
        } catch (JWTException $e) {
            return redirect()->back()->withErrors(['error' => 'Could not create token']);
        }

        // Store the token in the session (or use local storage on the client side)
        session(['jwt_token' => $token]);
        session(['user' => $user]);

        return redirect()->route('home'); // Redirect to the home route after successful login
    }

    public function logout(Request $request)
    {
        try {
            $token = session('jwt_token');
            $user = JWTAuth::setToken($token)->authenticate();
            // return $user;

            if (!$user) {
                return redirect()->route('login')->withErrors(['error' => 'Failed to logout, token Invalied!!!']);
            }

            // Invalidate the current JWT token
            JWTAuth::invalidate($token);

            // Set the token field to null in the database
            if ($user) {
                $user->token = null; // Set token to null
                $user->save();
            }

            // Forget the token from the session
            session()->forget('jwt_token');

            session()->forget('user');


            return redirect()->route('login')->with('message', 'Successfully logged out.');
        } catch (JWTException $e) {
            return redirect()->route('login')->withErrors(['error' => 'Failed to logout, please try again']);
        }
    }
}
