<?php

if (!function_exists('domain_path')) {
    function domain_path(string $path = ''): string
    {
        return sprintf('%s/%s', base_path('TelegramBot'), $path);
    }
}
