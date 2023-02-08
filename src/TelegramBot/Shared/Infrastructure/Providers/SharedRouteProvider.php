<?php

namespace TelegramBot\Shared\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class SharedRouteProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::prefix('api')->name('message.text.')->group(
            function () {
                /*
                |--------------------------------------------------------------------------
                | Com Autenticação
                |--------------------------------------------------------------------------
                */
                Route::middleware([/* input middlewares */])->group(
                    function () {
                        Route::get('/', fn() => response()->json(['message' => 'bot on!'], Response::HTTP_OK))
                            ->name('health-check');
                    }
                );
            }
        );
    }
}
