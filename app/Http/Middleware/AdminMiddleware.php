<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is an admin (you'll need to define your logic here)
        if (auth()->user()->is_admin) {
            return $next($request);
        }

        return redirect()->route('dashboard'); // Redirect to a different route for non-admin users.
    }
}
