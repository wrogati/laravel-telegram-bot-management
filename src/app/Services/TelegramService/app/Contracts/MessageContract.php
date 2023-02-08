<?php

namespace App\Services\TelegramService\app\Contracts;

use App\Services\TelegramService\app\DTO\Message\AudioUploadResponse;
use App\Services\TelegramService\app\DTO\Message\Message;
use App\Services\TelegramService\app\Http\DTO\File\Animation;
use App\Services\TelegramService\app\Http\DTO\File\Audio;
use App\Services\TelegramService\app\Http\DTO\File\Document;
use App\Services\TelegramService\app\Http\DTO\File\Photo;
use App\Services\TelegramService\app\Http\DTO\File\Video;
use App\Services\TelegramService\app\Http\DTO\File\VideoNote;
use App\Services\TelegramService\app\Http\DTO\File\Voice;
use App\Services\TelegramService\app\Http\DTO\Message\TelegramSimpleMessage;

interface MessageContract
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
