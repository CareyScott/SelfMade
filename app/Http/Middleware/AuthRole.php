<?php
# @Date:   2020-11-30T11:47:05+00:00
# @Last modified time: 2021-05-14T16:30:12+01:00
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

     // this function handles the return redirect if a user tries to access a page they do not have permission to access
    public function handle(Request $request, Closure $next, ...$roles)
    {
      if (!$request->user() || !$request->user()->authorizeRoles($roles)) {
        //returns the user to their appropriate home
        return redirect()->route('home');
      }
        return $next($request);
    }
}
