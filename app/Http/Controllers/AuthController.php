<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request){

        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('TodoManager-Api')->plainTextToken;

        $response = [
            'user' => $user,
            'token'=>$token
        ];

        return response($response,201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string'
        ]);
        //Check Email
      $user =   User::where('email', '=', $request->email)->first();
      if(!$user || !Hash::check($request->password, $user->password))
      {
        $response = [
            'message'=>'Invalid Credentials',
        ];
        return response($response,401);
      }
      $token = $user->createToken('TodoManager-Api')->plainTextToken;

      $response = [
          'user' => $user,
          'token'=>$token
      ];

      return response($response,200);

    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        $response =[
            'message' => 'Logged Out'
        ];
        return response($response,200);
    }
    }
