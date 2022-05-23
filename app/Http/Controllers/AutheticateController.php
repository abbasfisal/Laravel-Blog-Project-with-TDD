<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\LogOutRequest;
use App\Http\Requests\RegisterNormallUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AutheticateController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Login user by email and password
     *
     * @param LoginRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            switch (Auth::user()->type) {
                case User::type_admin:
                    return redirect(route('dashboard.admin'));

                case User::type_writer:

                    return redirect(route('dashboard.writer'));

                case User::type_user:
                    //TODO درست کن وقتی نوبت یوزر عادی شد
                    return redirect(route("index.guest"));

                default:
                    abort(403);
                    break;
            }

        }

        //if user not found
        return redirect(route('login'))->with('email', 'User Name | Password Is Incorrect!');

    }

    /**
     * Log out a current User
     * @param LogOutRequest $request
     * @return string
     */
    public function logout(LogOutRequest $request)
    {
        Auth::logout();
        return redirect(route('index.guest'));
    }

    /**
     * show register form
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterNormallUserRequest $request)
    {
        try {

            $user = User::query()
                        ->create([
                            User::col_name     => $request->name,
                            User::col_email    => $request->email,
                            User::col_password => Hash::make($request->password),
                            User::col_type     => User::type_user
                        ]);
            Auth::login($user);
            return redirect(route('index.guest'));
        } catch (\Exception $e) {
            Log::error($e);
            abort(500);
        }

    }
}
