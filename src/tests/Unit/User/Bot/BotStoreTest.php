<?php

namespace Tests\Unit\User\Bot;

use Exception;
use Mockery;
use PHPUnit\Framework\TestCase;
use TelegramBot\Shared\Domain\Repositories\BotRepository;
use TelegramBot\User\Application\Bot\BotStore;
use Tests\Providers\User\Bot\BotStoreProvider as Provider;

class BotStoreTest extends TestCase
{
    public function testSuccess()
    {
        $botRepositoryMock = Mockery::mock(BotRepository::class);

        $payload = Provider::payloadSuccess();

        $botRepositoryMock->shouldReceive('store')
            ->once()
            ->andReturn(Provider::modelExpected());

        $store = new BotStore($botRepositoryMock);

        $bot = $store->handle($payload);

        $this->assertEquals($bot->telegram_id, $payload['telegram_id']);
    }

    public function testFailWithoutTelegramId()
    {
        $this->expectException(Exception::class);

        $store = new BotStore(app(BotRepository::class));

        $store->handle(Provider::payloadFailWithoutTelegramId());
    }
}
