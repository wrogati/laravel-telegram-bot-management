<?php

namespace TelegramBot\Bot\Infrastructure\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class BotNotUpdatedException extends BotException
{
    public function __construct()
    {
        parent::__construct(
            trans('bot.not-updated'),
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
}
