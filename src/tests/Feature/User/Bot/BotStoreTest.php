<?php

namespace Tests\Feature\User\Bot;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\Providers\User\Bot\BotStoreProvider;
use Tests\TestCase;

class BotStoreTest extends TestCase
{
    public function testSuccess()
    {
        $response = $this->postJson(route('user.new-bot', ['userId'=> (string)User::first()->_id]), [
            'telegram_id' => 'test'
        ]);

        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure(BotStoreProvider::structureExpected());
    }

    public function testFail()
    {
        $response = $this->postJson(route('user.new-bot', ['userId'=> (string)User::first()->_id]));

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonStructure(BotStoreProvider::structureErrorExpected());
    }
}
