<?php

namespace Tests\Unit\User\Bot;

use Mockery;
use PHPUnit\Framework\TestCase;
use TelegramBot\Shared\Domain\Repositories\BotRepository;
use TelegramBot\User\Application\Bot\IndexBotByUserId;
use Tests\Providers\User\Bot\BotIndexByUserProvider as Provider;

class BotIndexByUserTest extends TestCase
{
    public function testSuccess()
    {
        $botRepositoryMock = Mockery::mock(BotRepository::class);

        $botRepositoryMock->shouldReceive('getBotsByUserId')
            ->once()
            ->andReturn(Provider::collectionExpected());

        $action = new IndexBotByUserId($botRepositoryMock);

        $response = $action->handle(Provider::payloadSuccess());

        $model = Provider::modelOne();

        $this->assertEquals($model->created_by, $response[0]->created_by);
    }

    public function testFailWithoutUserId()
    {
        $this->expectException(\Exception::class);

        $action = new IndexBotByUserId(app(BotRepository::class));

        $action->handle([]);
    }
}
