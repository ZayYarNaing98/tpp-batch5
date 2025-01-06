<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        try{
            $credentials = $request->only(['email', 'password']);

            if(!JWTAuth::attempt($credentials)) {
                return $this->error("Your Email & Password doesn't match!", null, 401);
            }

            $user = User::where('email', $credentials['email'])->first();

            $payload = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => $user->address,
                'status' => $user->status === 1 ? 'active' : "inactive"
            ];

            $token = JWTAuth::customClaims($payload)->attempt(['email' => $user->email, 'password' => $credentials['password']]);

            return $this->success($token, "User Login Successfully", 200);

        } catch(Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Something went wrong!", null, $e->getCode() ? $e->getCode() : 500);
        }
    }
}
