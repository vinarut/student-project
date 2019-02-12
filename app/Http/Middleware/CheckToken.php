<?php

namespace App\Http\Middleware;

use Closure;
use App\Token;

class CheckToken
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
        if (Token::where('token', ltrim($request->getPathInfo(), '/register/'))->exists()) {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
