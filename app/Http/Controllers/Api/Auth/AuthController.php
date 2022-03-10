<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class AuthController extends Controller
{
    // Register a new costumer
    public function register(Request $request){
        $fields = $request->validate([

            'name' => 'required|string',
            'lastname' => 'required|string',
            'birthday' => 'required|date',
            'role' => 'required|integer',
            'privileges' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'phone' => 'required|string|unique:users,phone',
            'email' => 'required|string|unique:users,email',
            'status' => 'required|integer',
            'password' => 'required|string|confirmed'

        ]);

        $user = User::create([

            'name' => $fields['name'],
            'lastname' => $fields['lastname'],
            'birthday' => $fields['birthday'],
            'role' => $fields['role'],
            'privileges' => $fields['privileges'],
            'username' => $fields['username'],
            'phone' => $fields['phone'],
            'email' => $fields['email'],
            'status' => $fields['status'],
            'password' => bcrypt($fields['password'])

        ]);

        $token = $user->createtoken('costumerToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }

    // Login
    public function login(Request $request){
        $fields = $request->validate([

            'email' => 'required|string',
            'password' => 'required|string'

        ]);

        // Check the email
        $user = User::where('email', $fields['email'])->first();

        // Check the password
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message'=>'invalid credentials'
            ], 401);
        }


        $token = $user->createtoken('costumerToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }

    // loggin auth token authentication
    public function logout(Request $request){

        auth()->user()->tokens()->delete();

        return [
            'message'=>'Logged out'
        ];

    }

    // loggin auth token authentication
    public function sessioninfo(Request $request){
        

        return auth()->user();

    }
}
