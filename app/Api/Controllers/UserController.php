<?php

namespace App\Api\Controllers;

use App\Api\Requests\ForgetPasswordRequest;
use App\Api\Requests\LoginRequest;
use App\Api\Requests\RegisterRequest;
use App\Api\Requests\SetPasswordRequest;
use App\Api\Requests\VerifyEmailRequest;
use App\Api\Resources\UserResource;
use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\ForgetPassowrdNotification;
use App\Notifications\UserNotification;
use App\Notifications\UserRegister;
use Illuminate\Http\Request;
use JWTAuth;

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
                throw new \Exception("Invalid email or password", 401);
            }

            $user = \Auth::user();
            if ($user->email_verified_at == '') {
                throw new \Exception("Please verify your email address", 400);
            }
            return (new UserResource($user))->additional([
                'token' => $token,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status_code' => $e->getCode(),
                'message'     => $e->getMessage(),
            ], $e->getCode());
        }
    }

    /**
     * Register
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'first_name' => $request->get('first_name'),
            'last_name'  => $request->get('last_name'),
            'email'      => $request->get('email'),
            'password'   => bcrypt($request->get('password')),
            'phone'      => $request->get('phone'),
            'image'      => $request->get('image'),
        ]);
        if (!$user) {
            throw new \Exception("Please try again later.", 400);
        } else {
            $user->roles()->sync(['3']);
            $user['link'] = url('/verify/' . $user->email);
            $user->notify(new UserRegister($user));
            return (new UserResource($user))->additional([
                'status_code' => 200,
                'message'     => 'You have registered Successfully, Please check your to verify email address.',
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
            return response()->json([
                'code'    => 400,
                'message' => 'Please try again later.',
            ]);
        } else {
            $token = str_random(10);
            PasswordReset::create([
                'email' => $request->get('email'),
                'token' => $token,
            ]);

            $user['link'] = url('/set-password/' . $user->email . '/' . $token);
            $user->notify(new ForgetPassowrdNotification($user));

            return response()->json([
                'status_code' => 200,
                'message'=> 'Reset password mail has been sent, Please check your email address to reset password.',
            ]);
        }
    }
    /**
     * Verify email
     */
    public function verifyEmail(VerifyEmailRequest $request)
    {
        $user = User::where([
            'email'             => $request->get('email'),
            'email_verified_at' => null,
        ])->first();

        if (!$user) {
            return response()->json([
                'code'    => 400,
                'message' => 'Email was already verified',
            ]);
        } else {
            $user->update(['email_verified_at' => date('Y-m-d H:i:s')]);

            return response()->json([
                'code'    => 200,
                'message' => 'Your email has been verified successfully',
            ]);
        }
    }

    /**
     * Reset Password
     */
    public function setPassword(SetPasswordRequest $request)
    {
        $rest = PasswordReset::where([
            'email' => $request->get('email'), 'token' => $request->get('token'),
        ])->first();

        if (!$rest) {
            throw new \Exception("Sorry, please try again later.", 400);
        }

        $user = User::where(['email' => $request->get('email')])->first();

        if (!$user) {
            throw new \Exception("Sorry, please try again later.", 400);
        } else {
            $user->update(['password' => bcrypt($request->get('password'))]);
            PasswordReset::where('email', $request->get('email'))->delete();

            $data['subject'] = 'Reset Password';
            $data['message'] = 'Your password successfully updated.';

            $user->notify(new UserNotification($data));
            return response()->json([
                'status_code' => 200,
                'message'     => 'Your password has been successfully updated',
            ]);
        }
    }

    /**
     * Get Authenticated User
     */
    public function getAuthenticatedUser(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        return new UserResource($user);
    }
}
