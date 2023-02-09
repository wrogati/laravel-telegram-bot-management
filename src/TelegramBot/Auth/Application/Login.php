<?php

namespace TelegramBot\Auth\Application;

use App\Models\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use TelegramBot\Auth\Domain\DTO\SessionStoreDTO;
use TelegramBot\Auth\Domain\Repositories\SessionRepository;
use TelegramBot\Auth\Infrastructure\Exceptions\InvalidCredentialsException;
use TelegramBot\Shared\Domain\Repositories\UserRepository;

class Login
{
    public function __construct(
        private readonly UserRepository    $userRepository,
        private readonly SessionRepository $sessionRepository
    )
    {
    }

    /**
     * @throws InvalidCredentialsException
     */
    public function handle(array $data): Session
    {
        $user = $this->userRepository->getByEmail($data['email']);

        if (!$this->attempt($user->getAttribute('password'), $data['password']))
            throw new InvalidCredentialsException();

        $dto = new SessionStoreDTO(
            Str::uuid()->toString(),
            Carbon::now()
                ->addHours(config('app.ttl_session'))
                ->format('Y-m-d H:i:s')
        );

        return $this->sessionRepository->store($user, $dto);
    }

    private function attempt(string $userPassword, string $loginPassword): bool
    {
        return Hash::check($loginPassword, $userPassword);
    }
}
