<?php

namespace App\Enums;

enum DDDFoldersEnum
{
    case APPLICATION;
    case DOMAIN;
    case INFRASCTRUCTURE;
    case PRESENTATION;

    public static function all(): array
    {
        return [
            self::APPLICATION->name(), self::DOMAIN->name(), self::INFRASCTRUCTURE->name(), self::PRESENTATION->name()
        ];
    }

    public function name(): string
    {
        return match ($this) {
            self::APPLICATION => 'Application',
            self::DOMAIN => 'Domain',
            self::INFRASCTRUCTURE => 'Infrastructure',
            self::PRESENTATION => 'Presentation'
        };
    }
}
