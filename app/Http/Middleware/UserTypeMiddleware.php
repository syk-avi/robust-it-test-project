<?php

namespace App\Http\Middleware;


use Closure;

class UserTypeMiddleware
{

    public static $allowedUserTypes = ['super_admin', 'admin'];

    public function handle($request, Closure $next)
    {


        if (auth()->guard('admins')->check()) {

            $admin = auth()->guard('admins')->user();

            if (in_array($admin->user_type, self::$allowedUserTypes)) {
                return $next($request);
            }
        }


        return redirect(route('login'));


    }
}
