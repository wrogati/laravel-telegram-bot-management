<?php

namespace Tests\Providers\Message;

use App\Models\Bot;
use App\Models\Message;
use App\Services\TelegramService\app\DTO\Message\Message as MessageDTO;
use App\Services\TelegramService\app\Http\DTO\File\Audio;

class SendAudioProvider
{
    public static function payloadSucess(): array
    {
        return [
            'audio.txt' => 'test',
            'chat_id' => -112,
            'bot_id' => 'test'
        ];
    }

    public static function payloadFail(): array
    {
        return [
            'audio.txt' => 'test',
            'bot_id' => 'test'
        ];
    }

    public static function bot(): Bot
    {
        $model = new Bot();

        $model->_id = 'test';
        $model->telegram_id = 'test';

        return $model;
    }

    public static function dtoExpected(): Audio
    {
        return new Audio('test', 'test');
    }

    public static function modelExpected(): Message
    {
        return new Message();
    }

    public static function responseExpected(): MessageDTO
    {
        return MessageDTO::makeFromArray(['message_id' => 'test']);
    }
}
