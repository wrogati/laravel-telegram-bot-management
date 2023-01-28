<?php

namespace TelegramBot\Message\Text\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use TelegramBot\Shared\Application\Services\TelegramService;

class MessageTextRouteProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::prefix('message/text')->name('message.text.')->group(
            function () {
                /*
                |--------------------------------------------------------------------------
                | Com Autenticação
                |--------------------------------------------------------------------------
                */
                Route::middleware([])->group(
                    function () {
                        Route::get('/', function () {
                            $s = new TelegramService('abc');
                            dd($s->bot());
                        })->name('send');
                    }
                );
            }
        );
    }
}
