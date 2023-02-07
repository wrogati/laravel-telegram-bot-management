<?php

namespace TelegramBot\User\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use TelegramBot\User\Presentation\Controllers\ActiveUserController;
use TelegramBot\User\Presentation\Controllers\CRUD\UserShowController;
use TelegramBot\User\Presentation\Controllers\CRUD\UserStoreController;
use TelegramBot\User\Presentation\Controllers\CRUD\UserUpdateController;
use TelegramBot\User\Presentation\Controllers\InactiveUserController;

class UserRouteProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::prefix('user')->name('user.')->group(
            function () {
                Route::middleware([/* input middlewares */])->group(
                    function () {
                        Route::post('', UserStoreController::class)->name('store');
                        Route::group(['prefix' => '{userId}'], function () {
                            Route::get('', UserShowController::class)->name('show');
                            Route::patch('', UserUpdateController::class)->name('update');
                            Route::get('inactive', InactiveUserController::class)->name('inactivate');
                            Route::get('activate', ActiveUserController::class)->name('activate');
                        });
                    });
            });
    }
}
