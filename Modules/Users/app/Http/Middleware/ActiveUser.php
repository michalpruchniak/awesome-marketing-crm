<?php

namespace Modules\Users\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class ActiveUser
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->ban) {
                Auth::logout();

                return redirect()->route('login')->withErrors([
                    'ban' => 'Your account has been banned',
                ]);
            }
        }

        return $next($request);
    }
}
