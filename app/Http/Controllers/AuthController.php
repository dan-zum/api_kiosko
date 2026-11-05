<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  
    public function register(RegistroRequest $request) {
        try {
            $data = $request->validated();
    
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'number' => $data['number'],
                'password' => bcrypt($data['password'])
            ]);
    
            return [
                'token' => $user->createToken('token')->plainTextToken,
                'user' => $user
            ];
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    

    public function login(LoginRequest $request) {
        $data = $request->validated();

        // Revisar el password
        if(!Auth::attempt($data)) {
            return response([
                'errors' => ['El email o el password son incorrectos']
            ], 422);
        }

        // Autenticar al usuario
        $user = Auth::user();
        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];
    }

    public function logout(Request $request) {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return [
            'user' => null
        ];
    }
}
