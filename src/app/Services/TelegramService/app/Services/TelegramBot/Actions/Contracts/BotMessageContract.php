<?php

namespace TelegramBot\Services\TelegramBot\Actions\Contracts;

use TelegramBot\Services\TelegramBot\DTO\Message\AudioUploadResponse;
use TelegramBot\Services\TelegramBot\DTO\Message\Message;
use TelegramBot\Services\TelegramBot\Http\DTO\File\Animation;
use TelegramBot\Services\TelegramBot\Http\DTO\File\Audio;
use TelegramBot\Services\TelegramBot\Http\DTO\File\Document;
use TelegramBot\Services\TelegramBot\Http\DTO\File\Photo;
use TelegramBot\Services\TelegramBot\Http\DTO\File\Video;
use TelegramBot\Services\TelegramBot\Http\DTO\File\VideoNote;
use TelegramBot\Services\TelegramBot\Http\DTO\File\Voice;
use TelegramBot\Services\TelegramBot\Http\DTO\Message\TelegramSimpleMessage;

interface BotMessageContract
{
    public function sendSimpleMessage(TelegramSimpleMessage $message): ?Message;

    public function sendAudio(Audio $file): ?AudioUploadResponse;

    public function sendPhoto(Photo $file): ?Message;

    public function sendDocument(Document $file): ?Message;

    public function sendVideo(Video $file): ?Message;

    public function sendAnimation(Animation $file): ?Message;

    public function sendVoice(Voice $file): ?Message;

    public function sendVideoNote(VideoNote $file): ?Message;
}
