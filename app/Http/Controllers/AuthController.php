<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;



class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {

    }

    public function test() {
        return response([
            'user'=> 'yusuf',
            'token'=> 'aguygc8yuqty378686r391yudh'
        ]);
    }


    public function register(Request $request)
    {
        $data = $request->validate([
            'name'=> 'required|string',
            'email'=> 'required|email|string|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols()
            ]
            ]);

        $user = User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> bcrypt($data['password'])
        ]);
        
        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user'=> $user,
            'token'=> $token
        ]);
    }







}
