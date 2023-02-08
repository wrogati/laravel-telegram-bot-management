<?php

namespace App\Services\TelegramService\app\Http;

use GuzzleHttp\Psr7\Response;

class MessageClient
{
    public function __construct(private readonly TelegramClient $client)
    {
    }

    public function sendMessage(array $data): Response
    {
        return $this->client->makeRequest(
            'post',
            'sendMessage',
            $data
        );
    }

    public function sendAudio(array $data): Response
    {
        return $this->client->makeRequest(
            'post',
            'sendAudio',
            $data
        );
    }

    public function sendPhoto(array $data): Response
    {
        return $this->client->makeRequest(
            'post',
            'sendPhoto',
            $data
        );
    }

    public function sendDocument(array $data): Response
    {
        return $this->client->makeRequest(
            'post',
            'sendDocument',
            $data
        );
    }

    public function sendVideo(array $data): Response
    {
        return $this->client->makeRequest(
            'post',
            'sendVideo',
            $data
        );
    }

    public function sendAnimation(array $data): Response
    {
        return $this->client->makeRequest(
            'post',
            'sendAnimation',
            $data
        );
    }

    public function sendVoice(array $data): Response
    {
        return $this->client->makeRequest(
            'post',
            'sendVoice',
            $data
        );
    }

    public function sendVideoNote(array $data): Response
    {
        return $this->client->makeRequest(
            'post',
            'sendVideoNote',
            $data
        );
    }

    public function sendMediaGroup(array $data): Response
    {
        return $this->client->makeRequest(
            'post',
            'sendMediaGroup',
            $data
        );
    }
}
