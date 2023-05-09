<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectToVotingPage
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
        if (in_array(4, $request->user()->roles->pluck('id')->toArray()) ) {
            return redirect()->route('voting');
        }
        if (in_array(5, $request->user()->roles->pluck('id')->toArray()) ) {
            return redirect()->route('voting');
        }
        return $next($request);
    }
}
