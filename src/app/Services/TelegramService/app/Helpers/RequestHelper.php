<?php

namespace TelegramBot\Helpers;

use TelegramBot\Services\TelegramBot\Http\DTO\File\MediaGroup\MediaGroup;

class RequestHelper
{
    public static function asMultipart(array $content): array
    {
        $multipart = ['multipart' => []];

        foreach ($content as $name => $contents) {
            $multipart['multipart'][] = ['name' => $name, 'contents' => $contents];
        }

        return $multipart;
    }

    public static function multipleFilesAsMultipart(MediaGroup $files): array
    {
        $multipart = [
            'multipart' => [
                [
                    'name' => 'media',
                    'contents' => null
                ],
                [
                    'name' => 'chat_id',
                    'contents' => $files->chatId
                ]
            ]
        ];

        foreach ($files->media as $file) {
            foreach ($file->toArray() as $name => $contents) {
                $multipart['multipart'][0]['contents'][] = ['name' => $name, 'contents' => $contents];
            }
        }

        return $multipart;
    }
}