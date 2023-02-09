<?php

namespace App\Http\Middleware;

use App\Exceptions\InvalidSessionException;
use App\Models\Session;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use TelegramBot\Auth\Domain\Repositories\SessionRepository;

class Authenticate
{
    /**
     * @throws InvalidSessionException
     */
    public function handle(Request $request, Closure $next)
    {
        $authSecureCode = $request->header('auth-secure-token');

        if (empty($authSecureCode))
            throw new InvalidSessionException();

        $session = $this->getSession($authSecureCode);
        if (empty($session))
            throw new InvalidSessionException();

         if ($this->isInvalidSession($session))
             throw new InvalidSessionException();

        return $next($request);
    }

    public function getSession(string $authSecureCode): ?Session
    {
        return (app(SessionRepository::class))->getByAuthSecureToken($authSecureCode);
    }

    private function isInvalidSession(Session $session): bool
    {
        return Carbon::parse($session->getAttribute('expires_in'))->lessThan(Carbon::now());
    }
}
