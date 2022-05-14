<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\LogOutRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
                    //TODO وقتی نوبت نویسنده شد درست کن ریدایرکت رو
                    return 'writer loged in success';

                case User::type_user:
                    //TODO درست کن وقتی نوبت یوزر عادی شد
                    return 'normal user loged in success ';

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
        return redirect(route('login'));
    }
}
