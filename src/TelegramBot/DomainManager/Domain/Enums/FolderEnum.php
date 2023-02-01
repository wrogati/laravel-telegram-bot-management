<?php

namespace TelegramBot\DomainManager\Domain\Enums;

enum FolderEnum
{
    case APPLICATION;
    case DOMAIN;
    case INFRASTRUCTURE;
    case PRESENTATION;

    public function name(): string
    {
        return match ($this) {
            self::APPLICATION => 'Application',
            self::DOMAIN => 'Domain',
            self::INFRASTRUCTURE => 'Infrastructure',
            self::PRESENTATION => 'Presentation',
        };
    }

    public static function all(): array
    {
        return [self::APPLICATION->name(), self::DOMAIN->name(), self::INFRASTRUCTURE->name(), self::PRESENTATION->name()];
    }
}
