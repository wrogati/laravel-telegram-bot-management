<?php

namespace TelegramBot\User\Application\Actions;

use App\Models\User;
use Illuminate\Support\Fluent;
use TelegramBot\User\Domain\DTO\UserUpdateDTO;
use TelegramBot\User\Domain\Exceptions\UserNotUpdatedException;
use TelegramBot\User\Domain\Repository\UserRepository;

class Update
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    /**
     * @throws UserNotUpdatedException
     */
    public function handle(string $id, array $data): void
    {
        $data = new Fluent($data);

        $user = $this->userRepository->getById($id);

        $dto = new UserUpdateDTO($data->get('first_name'), $data->get('last_name'));

        if (!$this->userRepository->update($user, $dto))
            throw new UserNotUpdatedException();
    }
}
