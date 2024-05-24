<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckRole
{
    public function handle($request, Closure $next, ...$role_id)
    {
        $roleIds = ['admin' => 1, 'karyawan' => 2, 'pembeli' => 3];
        $allowedRoleIds = [];
        foreach ($role_id as $as) {
            if (isset($roleIds[$as])) {
                $allowedRoleIds[] = $roleIds[$as];
            }
        }
        $allowedRoleIds = array_unique($allowedRoleIds);

        if (Auth::check()) {
            if (in_array(Auth::user()->role_id, $allowedRoleIds)) {
                return $next($request);
            }
        }

        return redirect('/');
    }
}
