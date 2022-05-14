<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    /**
     * Handle Incomming Request
     *
     * @param Request $request
     * @param Closure $next
     * @param ...$guards
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                self::Redirect($guard);
            }
        }

        return $next($request);
    }


    /**
     * Redirect to their index page  According to the users table type column
     *
     */
    private static function Redirect(?string $guard): void
    {
        switch (Auth::guard($guard)->user()->type) {
            case User::type_admin:
                dd('admin');
            case User::type_writer:
                dd('wiriter');
            case User::type_user:
                dd('normalluser');

            default:
                abort(403);
                break;
        }
    }

}
