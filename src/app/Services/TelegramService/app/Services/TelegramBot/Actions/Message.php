<?php

namespace App\Services\TelegramService\app\Services\TelegramBot\Actions;

use App\Services\TelegramService\app\Helpers\RequestHelper;
use App\Services\TelegramService\app\Services\TelegramBot\Actions\Contracts\BotMessageContract;
use App\Services\TelegramService\app\Services\TelegramBot\DTO\Message\AudioUploadResponse;
use App\Services\TelegramService\app\Services\TelegramBot\DTO\Message\Message as MessageDTO;
use App\Services\TelegramService\app\Services\TelegramBot\Http\DTO\File\Animation;
use App\Services\TelegramService\app\Services\TelegramBot\Http\DTO\File\Audio;
use App\Services\TelegramService\app\Services\TelegramBot\Http\DTO\File\Document;
use App\Services\TelegramService\app\Services\TelegramBot\Http\DTO\File\MediaGroup\MediaGroup;
use App\Services\TelegramService\app\Services\TelegramBot\Http\DTO\File\Photo;
use App\Services\TelegramService\app\Services\TelegramBot\Http\DTO\File\Video;
use App\Services\TelegramService\app\Services\TelegramBot\Http\DTO\File\VideoNote;
use App\Services\TelegramService\app\Services\TelegramBot\Http\DTO\File\Voice;
use App\Services\TelegramService\app\Services\TelegramBot\Http\DTO\Message\TelegramSimpleMessage;
use App\Services\TelegramService\app\Services\TelegramBot\Http\MessageClient;
use App\Services\TelegramService\app\Services\TelegramBot\Http\TelegramClient;

class Message implements BotMessageContract
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
