<?php

namespace Tests\Providers\User\Bot;

use App\Models\Bot;
use MongoDB\BSON\ObjectId;
use TelegramBot\User\Domain\DTO\BotStoreDTO;

class BotStoreProvider
{
    public static function payloadSuccess(): array
    {
        return [
            'telegram_id' => 'test',
            'created_by' => '63e453d98d754718420462d2'
        ];
    }

    public static function modelExpected(): Bot
    {
        $data = self::payloadSuccess();

        $model = new Bot();

        $model->telegram_id = $data['telegram_id'];
        $model->created_by = $data['created_by'];

        return $model;
    }

    public static function payloadFailWithoutTelegramId(): array
    {
        return [
            'created_by' => '63e453d98d754718420462d2'
        ];
    }

    public static function structureExpected(): array
    {
        return [
            'data' => [
                'id'
            ]
        ];
    }

    public static function structureErrorExpected(): array
    {
        return [
            'errors' => [
                'telegram_id'
            ]
        ];
    }
}
