<?php

namespace App\Services\TelegramService\app;

use App\Services\TelegramService\app\Contracts\MessageContract;
use App\Services\TelegramService\app\DTO\Message\Message as MessageDTO;
use App\Services\TelegramService\app\Http\DTO\File\Animation;
use App\Services\TelegramService\app\Http\DTO\File\Audio;
use App\Services\TelegramService\app\Http\DTO\File\Document;
use App\Services\TelegramService\app\Http\DTO\File\MediaGroup\MediaGroup;
use App\Services\TelegramService\app\Http\DTO\File\Photo;
use App\Services\TelegramService\app\Http\DTO\File\Video;
use App\Services\TelegramService\app\Http\DTO\File\VideoNote;
use App\Services\TelegramService\app\Http\DTO\File\Voice;
use App\Services\TelegramService\app\Http\DTO\Message\TelegramSimpleMessage;
use App\Services\TelegramService\app\Http\MessageClient;
use App\Services\TelegramService\app\Http\TelegramClient;
use App\Services\TelegramService\app\Utils\RequestUtil;

class Message implements MessageContract
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

    public function sendAudio(Audio $file): ?MessageDTO
    {
        $body = filter_var($file->audio, FILTER_VALIDATE_URL)
            ? ['json' => $file->toArray()]
            : RequestUtil::asMultipart($file->toArray());

        $response = $this->client->sendAudio($body);

        $data = json_decode($response->getBody(), true)['result'];

        if (empty($data))
            return null;

        return MessageDTO::makeFromArray($data);
    }

    public function sendPhoto(Photo $file): ?MessageDTO
    {
        $body = filter_var($file->photo, FILTER_VALIDATE_URL)
            ? ['json' => $file->toArray()]
            : RequestUtil::asMultipart($file->toArray());

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
            : RequestUtil::asMultipart($file->toArray());

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
            : RequestUtil::asMultipart($file->toArray());

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
            : RequestUtil::asMultipart($file->toArray());

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
            : RequestUtil::asMultipart($file->toArray());

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
            : RequestUtil::asMultipart($file->toArray());

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
