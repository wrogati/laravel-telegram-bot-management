<?php

namespace Tests\Unit\User\Actions;

use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use PHPUnit\Framework\TestCase;
use TelegramBot\User\Application\Actions\Store;
use TelegramBot\User\Domain\Repository\UserRepository;
use Tests\Providers\User\UserStoreProvider as Provider;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreSuccess()
    {
        $storeMock = Mockery::mock(Store::class);
        $repositoryMock = Mockery::mock(UserRepository::class);

        $modelExpected = Provider::modelExpectedSuccess();

        $storeMock->shouldReceive('handle')
            ->once()
            ->with(Provider::unitPayloadExpectedSuccess())
            ->andReturn($modelExpected);

        $repositoryMock->shouldReceive('store')
            ->once()
            ->with(Provider::dtoExpectedSuccess())
            ->andReturn($modelExpected);

        $model = $storeMock->handle(Provider::unitPayloadExpectedSuccess());

        foreach ($model->toArray() as $key => $value) {
            $this->assertEquals($modelExpected->{$key}, $value);
        }
    }

    public function testStoreFail()
    {
        $this->expectException(Exception::class);

        $storeMock = Mockery::mock(Store::class);
        $storeMock->shouldReceive('handle')
            ->once()
            ->with();

        $storeMock->handle([]);
    }
}
