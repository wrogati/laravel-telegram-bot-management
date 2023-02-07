<?php

if (!function_exists('config')) {
    /**
     * The parameter must be for example 'telegram-bot.key'
     *
     * @param string $key
     * @return mixed
     */
    function config(string $key): mixed
    {
        $keys = explode('.', $key);

        $dir = __DIR__;

        $dir = str_replace(DIRECTORY_SEPARATOR . 'helpers', '', $dir);

        $file = require_once sprintf(
            '%s%sconfig%s%s.php',
            $dir,
            DIRECTORY_SEPARATOR,
            DIRECTORY_SEPARATOR,
            $keys[0]
        );

        array_splice($keys, 0, 1);

        $currentArray = $file;
        foreach ($keys as $key) {
            if (isset($currentArray[$key]) && is_array($currentArray[$key])) {
                $currentArray = $currentArray[$key];

                continue;
            }

            $finalKey = $currentArray[$key];
        }

        return $finalKey ?? null;
    }
}