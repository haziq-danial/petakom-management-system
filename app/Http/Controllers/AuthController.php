<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;


class AuthController extends Controller
{
    public function index() {
        return view('Auth.login');
    }

    public function user_login(Request $request){
        $request->validate([
            'umpid' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('umpid', 'password');

        if(Auth::attempt($credential)){
            return redirect()->intended('dashboard')->withSucccess('Login');
        }

        return redirect('login')->with('message', 'Login failed');
    }

    public function registration() {
        return view('Auth.registration');
    }

    public function staff_registration(Request $request) {
        $request->validate([
            'umpid' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $data = $request->all();

        User::create([
            'umpid' => $data['umpid'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name' => '',
            'phone' => '',
            'address' => '',
            'role' => 'Coordinator'
        ]);

        return redirect('registration')->with('message', 'Registration Successfully');
    }

    public function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect('login');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function indexForgotPassword() {
        return view ('Auth.forgot_password');
    }

    public function resetPassword(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            return[
                'status' => __($status)
            ];
        }

        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
    }

    public function reset(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirm', RulesPassword::defaults()],
        ]);

        $status = password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remeber_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if($status == Password::PASWORD_RESET) {
            return response([
                'message' => 'Password reset successfully'
            ]);
        }

        return response([
            'message' => __($token)
        ], 500);
    }
}
