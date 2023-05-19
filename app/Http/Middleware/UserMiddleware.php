<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if(Auth::user()->role_as == 2)
            {
                return $next($request);
                return redirect('/userdashboard');
            }
            else
            {
            // return 1;

                return redirect('/home')->with('status','Access Denied! as you are not as admin');
            }
        }
        else
        {
            return redirect('/userdashboard')->with('status','Please Login First');
        }
    }
}
