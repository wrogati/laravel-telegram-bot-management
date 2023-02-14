<?php

namespace TelegramBot\Auth\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use TelegramBot\Auth\Presentation\Controllers\LoginController;

class AuthRouteProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::prefix('auth')->name('auth.')->group(
            function () {
                Route::middleware([/* adicionar middlewares */])->group(
                    function () {
                        Route::post('login', LoginController::class)->name('login');
                    }
                );
            }
        );
    }
}
