<?php

namespace App\Http\Middleware;

use App\Exceptions\InvalidTokenException;
use Closure;
use Illuminate\Http\Request;

class BotMiddleware
{
    /**
     * @throws InvalidTokenException
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->route('token');

        if (empty($token))
            throw new InvalidTokenException();

        //TODO:: implement regex validation for token

        return $next($request);
    }
}
