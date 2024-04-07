<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfDirectAccess
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
        // Check if the request was referred from an external source
        if (!$request->headers->has('referer') || parse_url($request->headers->get('referer'), PHP_URL_HOST) !== $request->getHost()) {
            // Redirect the user to the home page
            return redirect('/');
        }

        // Proceed with the request
        return $next($request);
    }
}
