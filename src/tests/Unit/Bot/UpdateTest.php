<?php

namespace Tests\Unit\Bot;

use Exception;
use Mockery;
use PHPUnit\Framework\TestCase;
use TelegramBot\Bot\Application\Update;
use TelegramBot\Shared\Domain\Repositories\BotRepository;
use Tests\Providers\Bot\UpdateProvider as Provider;

class UpdateTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     */
    public function testSuccess()
    {
        $updateMock = Mockery::mock(Update::class);

        $updateMock->shouldReceive('handle')
            ->once()
            ->with(Provider::payload())
            ->andReturn();

        $updateMock->handle(Provider::payload());
    }

    public function testFailWithoutBotId()
    {
        $this->expectException(Exception::class);

        $update = app(Update::class);

        $update->handle([]);
    }

    public function testFailNotUpdated()
    {
        $this->expectException(Exception::class);

        $repositoryMock = Mockery::mock(BotRepository::class);

        $model = Provider::bot();

        $dto = Provider::dtoExpected();

        $repositoryMock->shouldReceive('getById')
            ->once()
            ->with('test')
            ->andReturn($model);

        $repositoryMock->shouldReceive('update')
            ->once()
            ->with($model, $dto)
            ->andReturnFalse();

        $update = new Update($repositoryMock);

        $update->handle(Provider::payload());
    }
}
