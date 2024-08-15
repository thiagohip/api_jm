<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    function register(Request $request){
        try{
            $request->validate([
                'email'=>'required|string|email|unique:users',
                'name'=>'required|string',
                'password'=>'required|string|min:6',
            ]);
            $user = User::create([
                'email'=>$request->email,
                'name'=>$request->name,
                'password'=>Hash::make($request->password),
            ]);
            return $user;
        }catch(ValidationException $e){
            return response()->json([
                "message" => "error",
            ]);
        }
    }

    function login(Request $request) {
        $credentials = $request->only('email', 'password');
    
        if(Auth::attempt($credentials)){
            $user = $request->user();
            $token = $user->createToken('auth_token')->plainTextToken;
    
            return response()->json([
                "access_token" => $token,
                "user" => $user,
            ]);
        }
        return response()->json([
            "message" => "Invalid user",
        ]);
    }

    function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout realizado com sucesso'
        ]);
    }
}


