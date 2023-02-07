<?php

namespace TelegramBot\Telegram\Application;

use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Message\AudioUploadResponse;
use TelegramBot\Telegram\Domain\Services\Telegram\DTO\Message\Message as MessageDTO;
use TelegramBot\Telegram\Infrastructure\Helpers\RequestHelper;
use TelegramBot\Telegram\Infrastructure\Http\DTO\File\Animation;
use TelegramBot\Telegram\Infrastructure\Http\DTO\File\Audio;
use TelegramBot\Telegram\Infrastructure\Http\DTO\File\Document;
use TelegramBot\Telegram\Infrastructure\Http\DTO\File\MediaGroup\MediaGroup;
use TelegramBot\Telegram\Infrastructure\Http\DTO\File\Photo;
use TelegramBot\Telegram\Infrastructure\Http\DTO\File\Video;
use TelegramBot\Telegram\Infrastructure\Http\DTO\File\VideoNote;
use TelegramBot\Telegram\Infrastructure\Http\DTO\File\Voice;
use TelegramBot\Telegram\Infrastructure\Http\DTO\Message\TelegramSimpleMessage;
use TelegramBot\Telegram\Infrastructure\Http\MessageClient;
use TelegramBot\Telegram\Infrastructure\Http\TelegramClient;

class Message
{
    private MessageClient $client;

    public function __construct(TelegramClient $baseClient)
    {
        $this->client = new MessageClient($baseClient);
    }

    public function sendSimpleMessage(TelegramSimpleMessage $message): ?MessageDTO
    {
        $response = $this->client->sendMessage(['json' => $message->toArray()]);

        $data = json_decode($response->getBody(), true)['result'];

        if (empty($data))
            return null;

        return MessageDTO::makeFromArray($data);
    }

    public function sendAudio(Audio $file): ?AudioUploadResponse
    {
        $body = filter_var($file->audio, FILTER_VALIDATE_URL)
            ? ['json' => $file->toArray()]
            : RequestHelper::asMultipart($file->toArray());

        $response = $this->client->sendAudio($body);

        $data = json_decode($response->getBody(), true)['result'];

        if (empty($data))
            return null;

        return AudioUploadResponse::makeFromArray($data);
    }

    public function sendPhoto(Photo $file): ?MessageDTO
    {
        $body = filter_var($file->photo, FILTER_VALIDATE_URL)
            ? ['json' => $file->toArray()]
            : RequestHelper::asMultipart($file->toArray());

        $response = $this->client->sendPhoto($body);

        $data = json_decode($response->getBody(), true)['result'];

        if (empty($data))
            return null;

        return MessageDTO::makeFromArray($data);
    }

    public function sendDocument(Document $file): ?MessageDTO
    {
        $body = filter_var($file->document, FILTER_VALIDATE_URL)
            ? ['json' => $file->toArray()]
            : RequestHelper::asMultipart($file->toArray());

        $response = $this->client->sendDocument($body);

        $data = json_decode($response->getBody(), true)['result'];

        if (empty($data))
            return null;

        return MessageDTO::makeFromArray($data);
    }

    public function sendVideo(Video $file): ?MessageDTO
    {
        $body = filter_var($file->video, FILTER_VALIDATE_URL)
            ? ['json' => $file->toArray()]
            : RequestHelper::asMultipart($file->toArray());

        $response = $this->client->sendVideo($body);

        $data = json_decode($response->getBody(), true)['result'];

        if (empty($data))
            return null;

        return MessageDTO::makeFromArray($data);
    }

    public function sendAnimation(Animation $file): ?MessageDTO
    {
        $body = filter_var($file->animation, FILTER_VALIDATE_URL)
            ? ['json' => $file->toArray()]
            : RequestHelper::asMultipart($file->toArray());

        $response = $this->client->sendAnimation($body);

        $data = json_decode($response->getBody(), true)['result'];

        if (empty($data))
            return null;

        return MessageDTO::makeFromArray($data);
    }

    public function sendVoice(Voice $file): ?MessageDTO
    {
        $body = filter_var($file->voice, FILTER_VALIDATE_URL)
            ? ['json' => $file->toArray()]
            : RequestHelper::asMultipart($file->toArray());

        $response = $this->client->sendVoice($body);

        $data = json_decode($response->getBody(), true)['result'];

        if (empty($data))
            return null;

        return MessageDTO::makeFromArray($data);
    }

    public function sendVideoNote(VideoNote $file): ?MessageDTO
    {
        $body = filter_var($file->videoNote, FILTER_VALIDATE_URL)
            ? ['json' => $file->toArray()]
            : RequestHelper::asMultipart($file->toArray());

        $response = $this->client->sendVideoNote($body);

        $data = json_decode($response->getBody(), true)['result'];

        if (empty($data))
            return null;

        return MessageDTO::makeFromArray($data);
    }

    public function sendMediaGroup(MediaGroup $files): ?array
    {
        //TODO:: handle with multiples files in multipart
        $body = $this->getBodyForMediaGroup($files);

        $response = $this->client->sendMediaGroup($body);

        $data = json_decode($response->getBody(), true)['result'];

        if (empty($data))
            return null;

        return MessageDTO::makeMultiplesFromArray($data);
    }

    private function getBodyForMediaGroup(MediaGroup $files): array
    {
        return [];
    }

}
