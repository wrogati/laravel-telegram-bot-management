<?php

namespace TelegramBot\Message\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use TelegramBot\Message\Presentation\Controllers\SimpleMessageController;

class MessageRouteProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::prefix('{token}')->group(function () {
            Route::prefix('message')->name('message.')->group(
                function () {
                    Route::middleware(['bot'])->group(
                        function () {
                            Route::post('', SimpleMessageController::class)->name('simple');
                        }
                    );
                }
            );
        });
    }
}
