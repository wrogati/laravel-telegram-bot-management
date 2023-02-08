<?php

namespace App\Services\TelegramService\app\Http;

use GuzzleHttp\Client as Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Response;

class TelegramClient
{
    private Client $client;
    private array $headers;

    public function __construct(string $token)
    {
        $this->headers = ['accept' => 'application/json'];
        $this->client = new Client([
            'base_uri' => sprintf('https://api.telegram.org/bot%s/', $token),
            'headers' => $this->headers
        ]);
    }

    public function makeRequest(string $method, string $uri, array $data = []): Response
    {
        try {
            $response = $this->client->{$method}($uri, $data);
        } catch (ClientException|ServerException $exception) {
            dd($exception->getResponse()->getBody()->getContents(), json_decode($exception->getRequest()->getBody(), true));
        }

        return $response;
    }

    public function addheader(array $header): void
    {
        $this->headers = array_merge($this->headers, $header);
    }
}
