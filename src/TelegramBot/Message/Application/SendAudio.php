<?php

namespace TelegramBot\Message\Application;

use App\Services\TelegramService\app\Contracts\MessageContract;
use App\Services\TelegramService\app\Http\DTO\File\Audio;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use TelegramBot\Message\Domain\DTO\StoreMessageDTO;
use TelegramBot\Message\Domain\Enums\MessageTypeEnum;
use TelegramBot\Message\Domain\Repositories\MessageRepository;
use TelegramBot\Shared\Domain\Repositories\BotRepository;

class SendAudio
{
    private string $pathAudio;

    public function __construct(
        private readonly MessageContract   $messageService,
        private readonly MessageRepository $messageRepository,
        private readonly BotRepository     $botRepository
    )
    {
    }

    public function handle(array $data): void
    {
        $bot = $this->botRepository->getById($data['bot_id']);

        $audio = $this->getAudio($data['audio']);

        $dto = new Audio($data['chat_id'], $audio);

        $response = $this->messageService->sendAudio($dto);

        $dto = new StoreMessageDTO($bot->_id, MessageTypeEnum::AUDIO->description(), $response->toArray(true));

        $this->messageRepository->store($dto);

        $this->deleteAudio();
    }

    private function getAudio(mixed $audio)
    {
        if (is_string($audio))
            return $audio;

        $this->setPathAudio($audio);

        return fopen($this->pathAudio, 'r');
    }

    private function setPathAudio(UploadedFile $audio): void
    {
        $path = storage_path('app');
        $name = $audio->getClientOriginalName();

        $audio->move($path, $name);

        $this->pathAudio = sprintf('%s/%s', $path, $name);
    }

    private function deleteAudio(): void
    {
        Storage::delete(basename($this->pathAudio));
    }
}
