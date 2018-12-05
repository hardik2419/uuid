<?php

namespace App\Api\Controllers;

use App\Api\Requests\LoginRequest;
use App\Api\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

/**
 * @resource Auth
 */
class UserController extends Controller
{
    /**
     * Login
     */
    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        try {

            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }

            $user = User::where('email', $credentials['email'])->where('status', '!=', 'pending')->first();
            if (!$user) {
                throw new \Exception("Sorry Please verify your email address.", 400);
            }

            return response()->json([
                'code' => '200',
                'user' => $user,
                'token' => compact('token'),
            ]);
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
    }

    /**
     * Register
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'first_name'    => $request->get('first_name'),
            'last_name'     => $request->get('last_name'),
            'email'         => $request->get('email'),
            'password'      => bcrypt($request->get('password')),
            'phone'         => $request->get('phone')
        ]);
        if (!$user) {
            throw new \Exception("Sorry, please try again later.", 400);
        } else {
            return response()->json([
                'code' => '200',
                'success' => true,
                'message' => 'Register Successfully.',
                'user' => $user,
            ]);
        }
    }
    /**
     * Forget Password
     */
    public function forgetPassword(RegisterRequest $request)
    {
        $user = User::create([
            'first_name'    => $request->get('first_name'),
            'last_name'     => $request->get('last_name'),
            'email'         => $request->get('email'),
            'password'      => bcrypt($request->get('password')),
            'phone'         => $request->get('phone')
        ]);
        if (!$user) {
            throw new \Exception("Sorry, please try again later.", 400);
        } else {
            return response()->json([
                'code' => '200',
                'success' => true,
                'message' => 'Register Successfully.',
                'user' => $user,
            ]);
        }
    }
    public function getAuthenticatedUser(Request $request)
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(compact('user'));
    }
}
