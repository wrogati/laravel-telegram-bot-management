<?php

namespace Tests\Feature\Bot;

use App\Models\Bot;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    public function testSuccess()
    {
        $response = $this->patchJson(route('bot.update', ['botId' => (string)Bot::first()->_id]));

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

}
