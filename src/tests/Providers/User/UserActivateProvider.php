<?php

namespace Tests\Providers\User;

use App\Models\User;
use Illuminate\Support\Str;

class UserActivateProvider
{
    public static function id(): string
    {
        return Str::random();
    }

    public static function userExpected(): User
    {
        $user = new User();

        $user->first_name = 'test';
        $user->last_name = 'test';
        $user->active = true;

        return $user;
    }
}
