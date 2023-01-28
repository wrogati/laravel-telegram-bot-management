<?php

namespace Tests\Providers\User;

use App\Models\User;
use Illuminate\Support\Str;
use TelegramBot\User\Domain\DTO\UserUpdateDTO;

class UserUpdateProvider
{
    public static function userExpected(): User
    {
        $user = new User();

        $user->first_name = 'test';
        $user->last_name = 'test';

        return $user;
    }

    public static function payloadExpected(): array
    {
        return [
            'first_name' => 'changed',
            'last_name' => 'changed'
        ];
    }

    public static function dtoExptected(): UserUpdateDTO
    {
        return new UserUpdateDTO('changed', 'changed');
    }

    public static function id(): string
    {
        return Str::random();
    }
}
