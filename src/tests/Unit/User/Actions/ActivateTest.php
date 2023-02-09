<?php

namespace Tests\Unit\User\Actions;

use Exception;
use Mockery;
use PHPUnit\Framework\TestCase;
use TelegramBot\Shared\Domain\Repositories\UserRepository;
use TelegramBot\User\Application\Actions\Activate;
use Tests\Providers\User\UserActivateProvider as Provider;

class ActivateTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     */
    public function testSuccess()
    {
        $activateMock = Mockery::mock(Activate::class);
        $userRepositoryMock = Mockery::mock(UserRepository::class);

        $userExpected = Provider::userExpected();
        $id = Provider::id();

        $activateMock->shouldReceive('handle')
            ->once()
            ->with($id)
            ->andReturn();

        $userRepositoryMock->shouldReceive('getById')
            ->once()
            ->with($id)
            ->andReturn($userExpected);

        $userRepositoryMock->shouldReceive('update')
            ->once()
            ->with($userExpected)
            ->andReturnTrue();

        $activateMock->handle($id);
    }

    public function testFail()
    {
        $this->expectException(Exception::class);

        $activateMock = Mockery::mock(Activate::class);
        $id = Provider::id();

        $activateMock->shouldReceive('handle')
            ->once()
            ->with($id)
            ->andThrow(Exception::class);

        $activateMock->handle($id);
    }
}
