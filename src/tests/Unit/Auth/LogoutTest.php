<?php

namespace Tests\Unit\Auth;

use Exception;
use Mockery;
use TelegramBot\Auth\Application\Logout;
use TelegramBot\Auth\Domain\Repositories\SessionRepository;
use Tests\Providers\Auth\LogoutProvider as Provider;
use Tests\Unit\UnitTest;

class LogoutTest extends UnitTest
{
    /**
     * @doesNotPerformAssertions
     */
    public function testSuccess()
    {
        $logoutMock = Mockery::mock(Logout::class);

        $logoutMock->shouldReceive('handle')
            ->with('test')
            ->andReturn();

        $logoutMock->handle('test');
    }
    public function testFail()
    {
        $this->expectException(Exception::class);

        $sessionRepositoryMock = Mockery::mock(SessionRepository::class);

        $sessionRepositoryMock->shouldReceive('getByAuthSecureToken')
            ->once()
            ->with('test')
            ->andReturn(Provider::activeSession());

        $sessionRepositoryMock->shouldReceive('disableSession')
            ->once()
            ->andReturnFalse();

        $logout = new Logout($sessionRepositoryMock);

        $logout->handle('test');
    }
}
