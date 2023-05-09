<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }

    // custom added by Hazem to avoid unactive users from login
    protected function authenticate($request, array $guards)
    {
        parent::authenticate($request, $guards);

        if (!auth()->user()->active) {
auth()->guard('web')->logout();

            $this->unauthenticated($request, $guards);
        }
    }
}
