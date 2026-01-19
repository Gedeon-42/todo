<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
       public function showRegister() {
        return view('auth.register');
    }

       public function register(UserRequest $request) {
    $data = $request->validated();

              $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

           $token = $user->createToken('main')->plainTextToken;
        return response(compact('user', 'token'));
    }

     public function showLogin() {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (!Auth::attempt($credentials)) {
            return response([
                'message' => 'Provided email or password is incorrect'
            ], 422);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;
        return response(compact('user', 'token'));
    }
    

      public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

}
