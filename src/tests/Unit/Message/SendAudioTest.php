<?php

namespace Tests\Unit\Message;

use App\Services\TelegramService\app\Contracts\MessageContract;
use Exception;
use Mockery;
use TelegramBot\Message\Application\SendAudio;
use TelegramBot\Message\Domain\Repositories\MessageRepository;
use TelegramBot\Shared\Domain\Repositories\BotRepository;
use Tests\Providers\Message\SendAudioProvider as Provider;
use Tests\Unit\UnitTest;

class SendAudioTest extends UnitTest
{
    public function testSuccess()
    {
        $messageServiceMock = Mockery::mock(MessageContract::class);
        $messageRepositoryMock = Mockery::mock(MessageRepository::class);
        $botRepositoryMock = Mockery::mock(BotRepository::class);

        $botRepositoryMock->shouldReceive('getById')
            ->once()
            ->with('test')
            ->andReturn(Provider::bot());

        $messageServiceMock->shouldReceive('sendAudio')
            ->once()
            ->andReturn(Provider::responseExpected());

        $messageRepositoryMock->shouldReceive('store')
            ->once()
            ->andReturn(Provider::modelExpected());

        $sendAudio = new SendAudio($messageServiceMock, $messageRepositoryMock, $botRepositoryMock);

        $sendAudio->handle(Provider::payloadSucess());
    }

    public function testFail()
    {
        $this->expectException(Exception::class);
        $sendAudio = Mockery::mock(SendAudio::class);

        $sendAudio->shouldReceive('handle')
            ->once()
            ->with(Provider::payloadFail())
            ->andThrows(Exception::class);

        $sendAudio->handle(Provider::payloadFail());
    }
}
