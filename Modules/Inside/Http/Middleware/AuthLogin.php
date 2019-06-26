<?php

namespace Modules\Inside\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthLogin {
    public function handle($request, Closure $next) {
        if (!Auth::check())
        {
            return redirect('inside/users/login');
        }
        return $next($request);
    }

}
