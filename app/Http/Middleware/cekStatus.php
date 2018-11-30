<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class cekStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        // $user = \App\User::where('email', $request->email)->first();

        if (Auth::user()->role == 'admin') {
            return redirect('admin/new');
            // echo"admin";
        } elseif (Auth::user()->role == 'member') {
            return redirect('homestay/view');
            // echo "member";
        }else if(Auth::user()->role=='owner'){
            return redirect('admin/new');
            // echo"owner";
        }
        return $next($request);
    } 
}
