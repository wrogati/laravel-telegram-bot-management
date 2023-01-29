<?php

namespace Tests\Unit\User\Actions;

use App\Models\User;
use Exception;
use Mockery;
use Tests\TestCase;
use TelegramBot\User\Application\Actions\Show;
use TelegramBot\User\Domain\Repository\UserRepository;
use Tests\Providers\User\UserShowProvider as Provider;

class ShowTest extends TestCase
{
    public function testSuccess()
    {
        $actionMock = Mockery::mock(Show::class);

        $modelExpected = Provider::modelExpected();

        $actionMock->shouldReceive('handle')
            ->with('abc')
            ->andReturn($modelExpected);

        $modelResponse = $actionMock->handle('abc');

        foreach ($modelResponse->toArray() as $key => $value) {
            $this->assertEquals($modelExpected->{$key}, $value);
        }
    }

    public function testFail()
    {
        $this->expectException(Exception::class);

        $actionMock = Mockery::mock(Show::class);

        $actionMock->shouldReceive('handle')
            ->with('abc')
            ->andThrow(Exception::class);

        $actionMock->handle('abc');
    }
}
