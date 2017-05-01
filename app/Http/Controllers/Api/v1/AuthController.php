<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Support\Facades\Response;

use Request;
use App\Http\Controllers\Controller;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\SignUpRequest;

use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try{
            $statusCode = 200;
            $response = [];

            $credentials = Request::only('email', 'password');
            $credentials['active'] = 1;

            if (! $token = JWTAuth::attempt($credentials) ) {
                $response = [
                    'error' => 'invalid_credentials',
                ];
                $statusCode = 401;
            }
            else {
                $response = [
                    'token' => $token,
                ];
            }
        }catch (JWTException $e){
            $response = [
                'error' => 'could_not_create_token',
            ];
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
    }

    public function signup(SignUpRequest $request)
    {
        try{
            $statusCode = 200;
            $response = [];

            $data = Request::only('username', 'email', 'password');

            $user = User::create([
                'profile_id' => 5,
                'email' => $data['email'],
                'active' => 0,
                'username' => $data['username'],
                'name' => $data['username'],
                'password' => bcrypt($data['password']),
            ]);

            $token = JWTAuth::fromUser($user);

            $response = [
                'token' => $token,
            ];

        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
    }
}
