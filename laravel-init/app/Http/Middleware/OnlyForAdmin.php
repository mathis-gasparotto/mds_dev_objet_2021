<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OnlyForAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if ($user && $user->role != 'admin') {
            return redirect(route('user.dashboard'))->with('error-perm', "You do not have access to this part of the site");
        }
        return $next($request);
    }
}
