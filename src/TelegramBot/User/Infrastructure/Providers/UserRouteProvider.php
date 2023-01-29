<?php

namespace TelegramBot\User\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use TelegramBot\User\Presentation\Controllers\CRUD\UserShowController;
use TelegramBot\User\Presentation\Controllers\CRUD\UserStoreController;
use TelegramBot\User\Presentation\Controllers\CRUD\UserUpdateController;

class UserRouteProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::prefix('user')->name('user.')->group(
            function () {
                Route::middleware([/* input middlewares */])->group(
                    function () {
                        Route::post('', UserStoreController::class)->name('store');
                        Route::get('{userId}', UserShowController::class)->name('show');
                        Route::patch('{userId}', UserUpdateController::class)->name('update');
                    }
                );
            }
        );
    }
}
