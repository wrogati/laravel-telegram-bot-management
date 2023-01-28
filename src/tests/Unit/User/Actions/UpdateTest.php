<?php

namespace Tests\Unit\User\Actions;

use App\Models\User;
use Mockery;
use PHPUnit\Framework\TestCase;
use TelegramBot\User\Application\Actions\Update;
use TelegramBot\User\Domain\Exceptions\UserException;
use TelegramBot\User\Domain\Exceptions\UserNotUpdatedException;
use TelegramBot\User\Domain\Repository\UserRepository;
use Tests\Providers\User\UserUpdateProvider as Provider;

class UpdateTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     */
    public function testSuccess()
    {
        $userModelStub = $this->getMockBuilder(User::class)
            ->setMethods(['findOrFail', 'update'])
            ->getMock();

        $updateMock = Mockery::mock(Update::class);
        $userRepositoryMock = Mockery::mock(UserRepository::class);

        $userExpected = Provider::userExpected();
        $payloadExpected = Provider::successPayloadExpected();
        $id = Provider::id();

        $userModelStub->method('findOrFail')
            ->with($id)
            ->willReturn($userExpected);

        $userModelStub->method('update')
            ->with($payloadExpected)
            ->willReturn(true);

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
}
