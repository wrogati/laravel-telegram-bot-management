<?php

namespace Tests\Feature\User\Actions;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\Providers\User\UserInactivateProvider;
use Tests\TestCase;

class InactivateTest extends TestCase
{
    public function testSuccess()
    {
        $response = $this->getJson(route('user.inactivate', ['userId' => (string)User::first()->_id]));

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function testFailUserNotFound()
    {
        $response = $this->getJson(route('user.inactivate', ['userId' => UserInactivateProvider::invalidId()]));

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
