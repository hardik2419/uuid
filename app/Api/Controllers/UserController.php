<?php

namespace App\Api\Controllers;

use App\Api\Requests\LoginRequest;
use App\Api\Requests\RegisterRequest;
use App\Api\Requests\ForgetPasswordRequest;
use App\Api\Requests\SetPasswordRequest;
use App\Api\Requests\VerifyEmailRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Notifications\UserRegister;
use App\Notifications\ForgetPassowrdNotification;
use App\Notifications\UserNotification;
use Config;

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

            $user = User::where('email', $credentials['email'])->where('is_verified', '!=', 0)->first();
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
            'phone'         => $request->get('phone'),
            'remember_token'=> str_random(10),
        ]);
        if (!$user) {
            throw new \Exception("Sorry, please try again later.", 400);
        } else {
            $user->roles()->sync(['3']);
            $user['link'] = Config::get('app.url') . '/verify/'.$user->email.'/'.$user->remember_token;
            $user->notify(new UserRegister($user));

            return response()->json([
                'code' => '200',
                'success' => true,
                'message' => 'Register Successfully.Please check your to verify email address.',
                'user' => $user,
            ]);
        }
    }
    /**
     * Forget Password
     */
    public function forgetPassword(ForgetPasswordRequest $request)
    {
        $user = User::where('email', $request->get('email'))->first();
        if (!$user) {
            throw new \Exception("Sorry, please try again later.", 400);
        } else {
            $user->update(['remember_token' => str_random(10)]);

            $user['link'] = Config::get('app.url') . '/set-password/'.$user->email.'/'.$user->remember_token;
            $user->notify(new ForgetPassowrdNotification($user));

            return response()->json([
                'code' => '200',
                'success' => true,
                'message' => 'Please check your email address to reset password.',
            ]);
        }
    }
    /**
     * verify user using email
     */
    public function verifyEmail(VerifyEmailRequest $request)
    {
        $user = User::where([
                'email' => $request->get('email'),
                'remember_token' => $request->get('token'),
                'is_verified' => 0
        ])->first();

        if (!$user) {
            throw new \Exception("Sorry, please try again later.", 400);
        } else {
            $user->update(['remember_token' => '', 'is_verified' => 1]);

            return response()->json([
                'code' => '200',
                'success' => true,
                'message' => 'Your email id successfully verifies.',
            ]);
        }
    }

    /**
     * Reset Password
     */
    public function setPassword(SetPasswordRequest $request)
    {
        $user = User::where(['email' => $request->get('email'), 'remember_token' => $request->get('token')])->first();
        if (!$user) {
            throw new \Exception("Sorry, please try again later.", 400);
        } else {
            $user->update(['remember_token' => '', 'password' => bcrypt($request->get('password'))]);
            $user['subject'] = 'Reset Password';
            $user['meg'] = 'Your password successfully updated.';
            $user->notify(new UserNotification($user));
            return response()->json([
                'code' => '200',
                'success' => true,
                'message' => 'Your password successfully updated.',
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
