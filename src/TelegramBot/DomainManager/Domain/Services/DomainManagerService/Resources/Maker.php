<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Resources;

use Illuminate\Support\Facades\Storage;
use TelegramBot\DomainManager\Domain\Enums\StubEnum;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\DomainResource;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers\Replacer;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers\ReplacerDTO;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators\Validator;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators\ValidatorDTO;

abstract class Maker
{
    protected Validator $validator;
    protected Replacer $replacer;

    protected StubEnum $enum;

    public function handle(string $domainName, ?string $class): DomainResource
    {
        $this->validate($domainName, $class);

        $this->createResource($domainName, $class);

        return $this->genereteResponse(Storage::disk('telegrambot')
            ->path(sprintf('%s/%s.php', $this->enum->path($domainName), $class)));
    }

    private function validate(string $domainName, ?string $class): void
    {
        $dto = new ValidatorDTO([
            'class'         => $class,
            'domain'        => $domainName,
            'path' => sprintf('%s/%s.php', $this->enum->path($domainName), $class)
        ]);

        $this->validator->handle($dto);
    }

    protected function createResource(string $domainName, string $class): void
    {
        $dto = new ReplacerDTO($this->enum->stub(), [
            'domain' => $domainName,
            'class'  => $class
        ]);

        $content = $this->replacer->handle($dto);

        Storage::disk('telegrambot')
            ->put(sprintf('%s/%s.php', $this->enum->path($domainName), $class), $content);
    }

    protected function genereteResponse(string $path): DomainResource
    {
        return new DomainResource($this->enum->type(), $this->getRealPath($path));
    }

    private function getRealPath(string $path): string
    {
        return explode(base_path(), $path)[1];
    }
}
