<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class PermissionMiddleware
{
    protected static $defaultRoutes = [
        'login',
        'logout',
        'dashboard',
        'permission.denied'
    ];

    public function handle($request, Closure $next)
    {
        $currentRoute = $request->route()->getName();

        $user = auth()->guard('admins')->user();
        $userType = $user->user_type;

        if ($userType == 'super_admin') {
            return $next($request);

        } else {
            $userRoutes = $this->getUserRoutes($user);
            $userAllowRoutes = array_merge($userRoutes, self::$defaultRoutes);

            if (in_array($currentRoute, $userAllowRoutes)) {
                return $next($request);
            } else {
                return redirect(route('permission.denied'));
            }
        }
    }

    private function getUserRoutes($user)
    {
        $userRoutes = [];
        foreach ($user->roles as $role) {
            foreach ($role->permission as $permission) {
                $userRoutes[] = $permission->route_name;
            }
        }

        return $userRoutes;
    }
}
