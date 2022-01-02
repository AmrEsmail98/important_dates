<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Validation\Rules\Password as RulesPassword;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use ApiResponser;
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:client');
    }

    protected function broker()
    {
        return Password::broker('clients');
    }

    protected function guard()
    {
        return Auth::guard('client');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => "required|email"]);

        $status =  Password::sendResetLink($request->only('email'));

        if ($status == Password::RESET_LINK_SENT) {
            return $this->success($status, 'Email Sent Successfully');
        }

        throw ValidationException::withMessages(['email' => $status,]);
        
    }

    public function reset(Request $request)
    {

        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', RulesPassword::defaults()],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                $user->tokens()->delete();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return $this->success('Message', 'Password reset successfully');
           
        }

        return response([
            'message'=> __($status)
        ], 500);

    }
}
