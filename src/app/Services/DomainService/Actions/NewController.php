<?php

namespace App\Services\DomainService\Actions;

use App\Enums\Stubs\DomainFileStubEnum;
use App\Services\DomainService\Replacers\ControllerReplacer;
use App\Services\DomainService\Validators\ControllerValidator;

class NewController
{
    public function __construct(
        private readonly ControllerValidator $validator,
        private readonly ControllerReplacer $replacer
    )
    {
    }

    public function handle(string $domain, string $file): string
    {
        $domainPath = sprintf('%s/TelegramBot/%s', base_path(), $domain);

        $filePath = sprintf('%s/Presentation/Controllers/%s.php', $domainPath, $file);

        $this->validator->handle($domainPath, $filePath);

        $this->createRequest($domain, $file, $filePath);

        return $filePath;
    }

    private function createRequest(string $domain, string $file, string $filePath): void
    {
        $content = $this->replacer->handle(
            DomainFileStubEnum::CONTROLLER->stub(),
            $domain,
            $file
        );

        file_put_contents($filePath, $content);
    }
}
