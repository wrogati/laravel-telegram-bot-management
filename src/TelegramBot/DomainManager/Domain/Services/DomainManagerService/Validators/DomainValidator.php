<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators;

use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators\Validations\ValidateDomainNotExist;

class DomainValidator extends Validator
{

    public function handle(ValidatorDTO $dto)
    {
        $this->validator
            ->send($dto->content)
            ->through([ValidateDomainNotExist::class])
            ->thenReturn();
    }
}
