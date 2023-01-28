<?php

namespace TelegramBot\User\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class UserRouteProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::prefix('-user')->name('.user.')->group(
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
