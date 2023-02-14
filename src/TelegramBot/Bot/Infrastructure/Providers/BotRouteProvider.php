<?php

namespace TelegramBot\Bot\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use TelegramBot\Bot\Presentation\Controllers\IndexController;
use TelegramBot\Bot\Presentation\Controllers\ShowController;
use TelegramBot\Bot\Presentation\Controllers\UpdateController;

class BotRouteProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::prefix('bot')->name('bot.')->group(
            function () {
                Route::middleware(['auth'])->group(
                    function () {
                        Route::get('', IndexController::class);
                        Route::group(['prefix' => '{botId}'], function () {
                            Route::get('', ShowController::class)->name('show');
                            Route::patch('', UpdateController::class)->name('update');
                        });
                    }
                );
            }
        );
    }
}
