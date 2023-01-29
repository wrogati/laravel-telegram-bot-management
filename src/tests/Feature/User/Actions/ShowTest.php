<?php

namespace Tests\Feature\User\Actions;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\Providers\User\UserShowProvider as Provider;
use Tests\TestCase;

class ShowTest extends TestCase
{
    public function testSuccess()
    {
        $response = $this->getJson(route('user.show', ['userId' => (string)User::first()->_id]));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(Provider::structureExpected());
    }

    public function testFail()
    {
        $response = $this->getJson(route('user.show', ['userId' => '63d575f462845c87c0032154']));

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
