<?php

namespace TelegramBot\User\Application\Actions;

use App\Models\User;
use Illuminate\Support\Fluent;
use TelegramBot\Shared\Domain\Repositories\UserRepository;
use TelegramBot\User\Domain\DTO\UserCreateDTO;

class Store
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function handle(array $data): User
    {
        $data = new Fluent($data);

        return $this->userRepository->store(new UserCreateDTO(
            $data->get('first_name'),
            $data->get('last_name'),
            $data->get('email'),
            $data->get('password')
        ));
    }
}
