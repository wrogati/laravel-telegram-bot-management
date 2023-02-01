<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators;


use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators\Validations\ValidateClassName;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators\Validations\ValidateControllerNotExist;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators\Validations\ValidateDomainExist;

class ControllerValidator extends Validator
{

    public function handle(ValidatorDTO $dto)
    {
        $this->validator
            ->send($dto->content['domain'])
            ->through([ValidateDomainExist::class])
            ->thenReturn();

        $this->validator
            ->send($dto->content['class'])
            ->through([ValidateClassName::class])
            ->thenReturn();

        $this->validator
            ->send($dto->content['path'])
            ->through([ValidateControllerNotExist::class])
            ->thenReturn();
    }
}
