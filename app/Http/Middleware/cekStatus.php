<?php

namespace App\Http\Middleware;

use Closure;

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
        // if (Auth::user->role == 'admin') {
        //     return redirect('{{route(homestay.view)}}');
        // } elseif (Auth::user->role == 'member') {
        //     return redirect('{{route(welcome)}}');
        // }
        return $next($request);
    } 
}
