<?php

namespace TelegramBot\Auth\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use TelegramBot\Auth\Presentation\Controllers\LoginController;
use TelegramBot\Auth\Presentation\Controllers\LogoutController;

class AuthRouteProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::prefix('auth')->name('auth.')->group(
            function () {
                Route::post('login', LoginController::class)->name('login');
                Route::get('logout', LogoutController::class)->middleware(['auth'])->name('logout');
            }
        );
    }
}
