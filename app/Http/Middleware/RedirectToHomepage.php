<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectToHomepage
{
    public function handle(Request $request, Closure $next)
    {
        /* if ($request->is('/') === false) {
            return redirect('/');
        } */
        $referrer = $request->headers->get('referer');

        // Check if the referrer is from the same domain
        if (empty($referrer) || parse_url($referrer, PHP_URL_HOST) !== $request->getHost()) {
            // Redirect to the home page
            return redirect('/');
        }
        

        return $next($request);
    }
}
