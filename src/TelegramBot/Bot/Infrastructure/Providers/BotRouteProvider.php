<?php

namespace TelegramBot\Bot\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class BotRouteProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::prefix('-bot')->name('.bot.')->group(
            function () {
                Route::middleware([/* input middlewares */])->group(
                    function () {
                        /* Input routes here */
                    }
                );
            }
        );
    }
}
