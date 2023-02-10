<?php

namespace Tests\Feature\User;

use Symfony\Component\HttpFoundation\Response;
use Tests\Providers\User\UserStoreProvider as Provider;
use Tests\TestCase;

class StoreTest extends TestCase
{
    public function testSuccess()
    {
        $response = $this->postJson(route('user.store'), Provider::featurePayloadExpectedSuccess());

        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure(Provider::successStructureExpected());
    }

    public function testFailPasswordNotConfirmed()
    {
        $response = $this->postJson(route('user.store'), Provider::featurePayloadExpectedFail());

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonStructure(Provider::failStructureExpected());
    }
}
