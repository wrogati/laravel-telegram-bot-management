<?php

namespace App\Services\DomainService\Actions;

use App\Enums\Stubs\DomainFileStubEnum;
use App\Services\DomainService\Replacers\RequestReplacer;
use App\Services\DomainService\Validators\RequestValidator;

class NewRequest
{
    public function __construct(
        private readonly RequestValidator $validator,
        private readonly RequestReplacer $replacer
    )
    {
    }

    public function handle(string $domain, string $file): string
    {
        $domainPath = sprintf('%s/TelegramBot/%s', base_path(), $domain);

        $filePath = sprintf('%s/Presentation/Requests/%s.php', $domainPath, $file);

        $this->validator->handle($domainPath, $filePath);

        $this->createRequest($domain, $file, $filePath);

        return $filePath;
    }

    private function createRequest(string $domainName, string $fileName, string $filePath): void
    {
        $content = $this->replacer->handle(
            DomainFileStubEnum::REQUEST->stub(),
            $domainName,
            $fileName
        );

        file_put_contents($filePath, $content);
    }
}
