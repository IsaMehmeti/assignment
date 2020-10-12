<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;

class AuthController extends Controller
{
     /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['login','register']]);
    }
	public function register(Request $request)
	{
		//validate incoming request 
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:admins',
            'password' => 'required',
        ]);
        
        try {
            Config::set('jwt.user', "App\Models\Admin");
            Config::set('auth.providers.users.model', \App\Models\Admin::class);
            $user = new Admin;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);
            $user->save();

            //return successful response
            return response()->json(['admin' => $user, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }
	}
     public function me()
    {   
        return response()->json(auth()->user());
    }
	    public function login()
    {
        Config::set('jwt.user', "App\Models\Admin");
        Config::set('auth.providers.users.model', \App\Models\Admin::class);
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }
	    
	    public function refresh()
    {
        dd( auth()->user());
    }
      protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 460
        ]);
    }

	}