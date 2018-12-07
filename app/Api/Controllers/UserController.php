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
use App\Api\Resources\UserResource;
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
                throw new \Exception("invalid_credentials", 500);
            }

            $user = \Auth::user();
            if ($user->is_verified == 0) {
                throw new \Exception("Sorry Please verify your email address.", 400);
            }
            return (new UserResource($user))->additional([
                'token' => $token
            ]);
        } catch (JWTException $e) {
            throw new \Exception("could not create token", 500);
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

            return (new UserResource($user))->additional([
                'status_code' => 200,
                'message' => 'Register Successfully.Please check your to verify email address.',
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
                'status_code' => 200,
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
                'code' => 200,
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
                'status_code' => 200,
                'message' => 'Your password successfully updated.',
            ]);
        }
    }

    public function getAuthenticatedUser(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        return new UserResource($user);
        //return response()->json(compact('user'));
    }
}
