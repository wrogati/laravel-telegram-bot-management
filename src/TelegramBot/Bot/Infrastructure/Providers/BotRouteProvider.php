<?php

namespace TelegramBot\Bot\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use TelegramBot\User\Presentation\Controllers\Bot\BotStoreController;

class BotRouteProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::prefix('bot')->name('bot.')->group(
            function () {
                Route::middleware([/* adicionar middlewares */])->group(
                    function () {
                        Route::post('{userId}', BotStoreController::class);
                    }
                );
            }
        );
    }
}
