<?php

namespace Tests\Providers\Auth;

use App\Models\Session;

class LogoutProvider
{
    public static function activeSession(): Session
    {
        $model = new Session();

        $model->_id = 'test';
        $model->auth_secure_token = 'test';
        $model->is_active = true;

        return $model;
    }

    public static function dtoExptected()
    {

    }
}
