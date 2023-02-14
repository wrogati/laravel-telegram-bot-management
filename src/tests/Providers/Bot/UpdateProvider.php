<?php

namespace Tests\Providers\Bot;

use App\Models\Bot;
use TelegramBot\Bot\Domain\DTO\BotUpdateDTO;

class UpdateProvider
{
    public static function payload(): array
    {
        return [
            'bot_id' => 'test'
        ];
    }

    public static function bot(): Bot
    {
        $model = new Bot();

        $model->telegram_id = 'test';

        return $model;
    }

    public static function dtoExpected(): BotUpdateDTO
    {
        return new BotUpdateDTO();
    }
}
