<?php

namespace App\Http\Middleware;

use Closure;

class Lang
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
            // lang() is helper function created in helper.php file that can change language from ar to en
            app()->setLocale(lang());

        return $next($request);
    }
}
