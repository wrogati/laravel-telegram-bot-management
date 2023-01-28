<?php

namespace Tests\Providers\User;

use App\Models\User;
use TelegramBot\User\Domain\DTO\UserCreateDTO;

class UserStoreProvider
{
    public static function unitPayloadExpectedSuccess(): array
    {
        return [
            'first_name' => 'test',
            'last_name' => 'test',
            'email' => 'test@email.com',
            'password' => 'testpassword',
            'password_confirmation' => 'testpassword'
        ];
    }

    public static function featurePayloadExpectedSuccess(): array
    {
        return [
            'first_name' => 'test',
            'last_name' => 'test',
            'email' => fake()->unique()->safeEmail(),
            'password' => 'testpassword',
            'password_confirmation' => 'testpassword'
        ];
    }

    public static function featurePayloadExpectedFail(): array
    {
        return [
            'first_name' => 'test',
            'last_name' => 'test',
            'email' => fake()->unique()->safeEmail(),
            'password' => 'testpassword',
        ];
    }

    public static function modelExpectedSuccess(): User
    {
        $model = new User();

        $model->first_name = 'test';
        $model->last_name = 'test';
        $model->email = 'test@email.com';

        return $model;
    }

    public static function dtoExpectedSuccess(): UserCreateDTO
    {
        return new UserCreateDTO('test', 'test', 'test@email.com', 'testpassword');
    }

    public static function successStructureExpected(): array
    {
        return [
            'data' => [
                'id', 'first_name', 'last_name', 'email'
            ]
        ];
    }

    public static function failStructureExpected(): array
    {
        return [
            'errors' => [
                'password'
            ]
        ];
    }
}
