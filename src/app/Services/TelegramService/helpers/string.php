<?php

if (!function_exists('camelCaseToSnakeCase')) {
    function camelCaseToSnakeCase(string $string): string
    {
        $words = preg_split('/(?=[A-Z])/', $string);

        $name = strtolower($words[0]);

        for ($i = 1; $i < count($words); $i++) {
            $name .= '_' . strtolower($words[$i]);
        }

        return $name;
    }
}