<?php
# @Date:   2020-11-30T11:47:05+00:00
# @Last modified time: 2021-01-23T15:30:44+00:00
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
      if (!$request->user() || !$request->user()->authorizeRoles($roles)) {
        return redirect()->route('home');
      }
        return $next($request);
    }
}
