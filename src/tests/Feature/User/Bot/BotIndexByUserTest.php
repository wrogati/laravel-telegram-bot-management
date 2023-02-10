<?php

namespace Tests\Feature\User\Bot;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\Providers\User\Bot\BotIndexByUserProvider;
use Tests\TestCase;

class BotIndexByUserTest extends TestCase
{
    public function testSuccess()
    {
        $response = $this->getJson(route('user.index-bot', ['userId' => (string)User::first()->_id]));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(BotIndexByUserProvider::structureExpected());
    }

    //TODO:: implement fail case
}
