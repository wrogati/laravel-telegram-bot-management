<?php

namespace TelegramBot\Auth\Application;

use Illuminate\Support\Carbon;
use TelegramBot\Auth\Domain\DTO\DisableSessionDTO;
use TelegramBot\Auth\Domain\Repositories\SessionRepository;
use TelegramBot\Auth\Infrastructure\Exceptions\CouldNotMakeLogoutException;

class Logout
{
    public function __construct(private readonly SessionRepository $sessionRepository)
    {
    }

    /**
     * @throws CouldNotMakeLogoutException
     */
    public function handle(string $token): void
    {
        $session = $this->sessionRepository->getByAuthSecureToken($token);

        $dto = new DisableSessionDTO(Carbon::now(), $session->_id, false);

        if (!$this->sessionRepository->disableSession($session, $dto))
            throw new CouldNotMakeLogoutException();
    }
}
