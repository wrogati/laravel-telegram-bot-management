<?php

namespace Tests\Unit\User\Actions;

use Exception;
use Mockery;
use PHPUnit\Framework\TestCase;
use TelegramBot\User\Application\Actions\Inactivate;
use TelegramBot\User\Application\Actions\Update;
use TelegramBot\User\Domain\Repository\UserRepository;
use Tests\Providers\User\UserInactivateProvider as Provider;

class InactivateTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     */
    public function testSuccess()
    {
        $inactivateMock = Mockery::mock(Inactivate::class);
        $userRepositoryMock = Mockery::mock(UserRepository::class);

        $userExpected = Provider::userExpected();
        $id = Provider::id();

        $inactivateMock->shouldReceive('handle')
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

        $inactivateMock->handle($id);
    }

    public function testFail()
    {
        $this->expectException(Exception::class);

        $inactivateMock = Mockery::mock(Inactivate::class);
        $id = Provider::id();

        $inactivateMock->shouldReceive('handle')
            ->once()
            ->with($id)
            ->andThrow(Exception::class);

        $inactivateMock->handle($id);
    }
}
