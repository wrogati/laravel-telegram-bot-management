<?php

namespace Tests\Providers\User\Bot;

use App\Models\Bot;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use MongoDB\BSON\ObjectId;
use TelegramBot\User\Domain\DTO\BotStoreDTO;

class BotIndexByUserProvider
{
    public static function structureExpected(): array
    {
        return [
            'data' => [
                '*' => [
                    'id'
                ]
            ]
        ];
    }

    public static function collectionExpected(): LengthAwarePaginator
    {
        return new LengthAwarePaginator([self::modelOne(), self::modelTwo()], 2, 10,);
    }

    public static function modelOne(): Bot
    {
        $model1 = new Bot();

        $model1->telegram_id = 'model1';
        $model1->created_by = 'test';

        return $model1;
    }

    public static function modelTwo(): Bot
    {
        $model2 = new Bot();

        $model2->telegram_id = 'model2';
        $model2->created_by = 'test';

        return $model2;
    }

    public static function payloadSuccess(): array
    {
        return [
            'user_id' => 'test'
        ];
    }
}
