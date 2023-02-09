<?php

namespace Tests\Unit\User\Actions;

use Exception;
use Mockery;
use PHPUnit\Framework\TestCase;
use TelegramBot\User\Application\Actions\Update;
use TelegramBot\User\Domain\Repositories\UserRepository;
use Tests\Providers\User\UserUpdateProvider as Provider;

class UpdateTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     */
    public function testSuccess()
    {
        $updateMock = Mockery::mock(Update::class);
        $userRepositoryMock = Mockery::mock(UserRepository::class);

        $userExpected = Provider::userExpected();
        $payloadExpected = Provider::successPayloadExpected();
        $id = Provider::id();

        $updateMock->shouldReceive('handle')
            ->once()
            ->with($id, $payloadExpected)
            ->andReturn();

        $userRepositoryMock->shouldReceive('getById')
            ->once()
            ->with($id)
            ->andReturn($userExpected);

        $userRepositoryMock->shouldReceive('update')
            ->once()
            ->with($userExpected, Provider::dtoExptected())
            ->andReturnTrue();

        $updateMock->handle($id, $payloadExpected);
    }

    public function testFail()
    {
        $this->expectException(Exception::class);

        $updateMock = Mockery::mock(Update::class);
        $payloadExpected = Provider::failPayloadExpected();
        $id = Provider::id();

        $updateMock->shouldReceive('handle')
            ->once()
            ->with($id, $payloadExpected)
            ->andThrow(Exception::class);

        $updateMock->handle($id, $payloadExpected);
    }
}
