<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register (Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return response()->json([
            'name' => $user->name,
            'email' => $user->email
        ], 201);
    }

    public function login(Request $request) {
        $user = User::where('email', $request -> email)->first();
        if (! $user || ! Hash::check($request->password, $user->password))
    {
        return response()->json([
            'messsage' =>['Username or password incorrect'],
        ], 200);
    }
        $user->tokens()->delete();

        $createdToken = $user->createToken('auth_token')->plainTextToken;
        //$currentAccessToken = $request->user()->currentAccessToken();
        [$id_personal_access_token, $onlyToken] = explode('|', $createdToken, 2);

        return response()->json([
            'status' => 'success',
            'message' => 'User logged in successfully',
            'name' => $user->name,
            'full_token' => $createdToken,
            'id_personal_access_token' => $id_personal_access_token,
            'onlyToken' => $onlyToken,
        ],200);
    }

    public function logout(Request $request) {
        $user = User::where('email', $request -> email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Username or password incorrect',
            ], 401);
        }
    
        $user->tokens()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User logged out successfully',
            'name' => $user->name,
            'email' => $user->email,
            'deleted_token' => $request->user()->currentAccessToken()
        ], 200);
    }
}
