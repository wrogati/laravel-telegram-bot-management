<?php

namespace Tests\Feature\Bot;

use App\Models\Bot;
use Symfony\Component\HttpFoundation\Response;
use Tests\Feature\FeatureTest;

class UpdateTest extends FeatureTest
{
    public function testSuccess()
    {
        $response = $this->authenticated()
            ->patchJson(route('bot.update', ['botId' => (string)Bot::first()->_id]));

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

}
