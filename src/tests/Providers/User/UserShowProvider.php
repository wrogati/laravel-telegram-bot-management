<?php

namespace Tests\Providers\User;

use App\Models\User;

class UserShowProvider
{
    public static function structureExpected(): array
    {
        return [
            'data' => [
                'id',
                'first_name',
                'last_name',
                'email'
            ]
        ];
    }

    public static function modelExpected(): User
    {
        $model = new User();

        $model->_id = 'abc';
        $model->first_name = 'test';
        $model->last_name = 'test';
        $model->email = 'test@email.com';

        return $model;
    }
}
