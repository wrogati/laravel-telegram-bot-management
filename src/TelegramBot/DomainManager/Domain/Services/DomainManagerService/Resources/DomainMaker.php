<?php

namespace TelegramBot\DomainManager\Domain\Services\DomainManagerService\Resources;

use Illuminate\Support\Facades\Storage;
use TelegramBot\DomainManager\Domain\Enums\FolderEnum;
use TelegramBot\DomainManager\Domain\Enums\StubEnum;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\DomainResource;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers\DomainReplacer;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Replacers\ReplacerDTO;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators\DomainValidator;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Validators\ValidatorDTO;

class DomainMaker extends Maker
{
    public function __construct(
    )
    {
        $this->validator = new DomainValidator();
        $this->replacer = new DomainReplacer();
        $this->enum = StubEnum::DOMAIN;
    }

    public function handle(string $domainName, ?string $class): DomainResource
    {
        $this->validateDomain($domainName);

        $this->createDomain($domainName);

        return $this->genereteResponse(Storage::disk('truckpag')->path($domainName));
    }

    private function validateDomain(string $domainName): void
    {
        $dto = new ValidatorDTO($domainName);

        $this->validator->handle($dto);
    }

    private function createDomain(string $domainName): void
    {
        $this->configureDomainFile($domainName);

        $this->configureFolders($domainName);

        $this->cofigureProviders($domainName);
    }

    private function configureDomainFile(string $domainName): void
    {
        $this->criarArquivo($domainName, 'Domain.php', StubEnum::DOMAIN);
    }

    private function criarArquivo(string $domainName, string $fileName, StubEnum $enum): void
    {
        $substituirDTO = new ReplacerDTO($enum->stub(), ['dominio' => $domainName]);

        $content = $this->replacer->handle($substituirDTO);

        Storage::disk('telegrambot')->put(sprintf('%s/%s', $domainName, $fileName), $content);
    }

    private function configureFolders(string $nomeDominio): void
    {
        foreach (FolderEnum::all() as $folder) {
            Storage::disk('telegrambot')->makeDirectory(sprintf('%s/%s', $nomeDominio, $folder));
        }
    }

    private function cofigureProviders(string $domainName): void
    {
        $this->configureServiceProvider($domainName);
        $this->configureRouteProvider($domainName);
    }

    private function configureServiceProvider(string $domainName): void
    {
        $path = sprintf('Infrastructure/Providers/%sServiceProvider.php', $domainName);

        $this->criarArquivo($domainName, $path, StubEnum::SERVICE_PROVIDER);
    }

    private function configureRouteProvider(string $domainName): void
    {
        $path = sprintf('Infrastructure/Providers/%sRouteProvider.php', $domainName);

        $this->criarArquivo($domainName, $path, StubEnum::ROUTE_PROVIDER);
    }
}
