<?php

namespace TelegramBot\Message\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use TelegramBot\Message\Presentation\Controllers\SendAudioController;
use TelegramBot\Message\Presentation\Controllers\SimpleMessageController;

class MessageRouteProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::prefix('message')->name('bot.')->group(function () {
            Route::prefix('{botId}')->name('message.')->group(function () {
                Route::post('message', SimpleMessageController::class)->name('simple');
                Route::post('send-audio', SendAudioController::class)->name('audio');
            });
        });
    }
}

