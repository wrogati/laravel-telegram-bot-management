<?php

namespace TelegramBot\Core\Classes;

use Illuminate\Console\Application as Artisan;
use Illuminate\Console\Command;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionException;
use Symfony\Component\Finder\Finder;

class TelegramBotCommandKernel extends ConsoleKernel
{
    /**
     * @throws ReflectionException
     */
    protected function commands()
    {
        $namespace = explode('\\', __NAMESPACE__)[0];
        $basePath = base_path() . "/$namespace";

        foreach ((new Finder())->in($basePath)->files() as $command) {
            $command = $namespace . str_replace(
                ['/', '.php'],
                ['\\', ''],
                Str::after($command->getRealPath(), $basePath)
            );

            if (
                is_subclass_of($command, Command::class) &&
                !(new ReflectionClass($command))->isAbstract()
            ) {
                Artisan::starting(function ($artisan) use ($command) {
                    $artisan->resolve($command);
                });
            }
        }
    }
}
