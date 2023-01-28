<?php

namespace Tests\Feature\User\Actions;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\Providers\User\UserUpdateProvider as Provider;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    public function testSuccess()
    {
        $response = $this->patchJson(route('user.update', ['userId' => (string)User::first()->_id]), Provider::successPayloadExpected());

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function testFail()
    {
        $response = $this->patchJson(route('user.update', ['userId' => (string)User::first()->_id]), Provider::failPayloadExpected());

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJsonStructure(Provider::errorsExpected());
    }
}
