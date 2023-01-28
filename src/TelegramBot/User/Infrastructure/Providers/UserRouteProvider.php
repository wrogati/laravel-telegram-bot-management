<?php

namespace TelegramBot\User\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use TelegramBot\User\Presentation\Controllers\CRUD\UserStoreController;

class UserRouteProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::prefix('user')->name('user.')->group(
            function () {
                Route::middleware([/* input middlewares */])->group(
                    function () {
                        Route::post('', UserStoreController::class)->name('store');
                    }
                );
            }
        );
    }
}
