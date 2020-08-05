<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class IsEditor
{

    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user->role == 1)
        {
            abort(404);;
        }

        return $next($request);

    }
}
