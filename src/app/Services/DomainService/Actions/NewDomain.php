<?php

namespace App\Services\DomainService\Actions;

use App\Enums\DDDFoldersEnum;
use App\Enums\Stubs\DomainFileStubEnum;
use App\Exceptions\Domain\DomainExistsException;

class NewDomain
{
    /**
     * @throws DomainExistsException
     */
    public function handle(string $name): string
    {
        $baseDirectory = base_path();

        $domainDirectory = sprintf('%s/%s/%s', $baseDirectory, 'TelegramBot', $name);

        $this->checkIfDomainExists($domainDirectory);

        $this->configureDomain($name, $domainDirectory);

        return $domainDirectory;
    }

    private function configureDomain(string $name, string $domainDirectory): void
    {
        $this->createFolder($domainDirectory);

        $this->configureDomainFile($name, $domainDirectory);

        $this->configureFolders($name, $domainDirectory);
    }

    private function configureDomainFile(string $domainName, string $domainDirectory): void
    {
        $content = $this->replaceContents(DomainFileStubEnum::DOMAIN->stub(), $domainName);

        file_put_contents(sprintf('%s/%s', $domainDirectory, 'Domain.php'), $content);
    }

    public function configureFolders(string $domainName, string $domainDirectory): void
    {
        foreach (DDDFoldersEnum::all() as $folder) {
            $this->createFolder(sprintf('%s/%s', $domainDirectory, $folder));
        }

        $this->createProviders($domainName, $domainDirectory);
    }

    private function createProviders(string $domainName, string $domainDirectory): void
    {
        $providerDirectory = sprintf('%s/%s', $domainDirectory, 'Infrastructure/Providers');

        $this->createFolder($providerDirectory);

        foreach ($this->getProvidersStubs() as $file => $content) {
            $content = $this->replaceContents($content, $domainName);

            $file = $this->replaceContents($file, $domainName);

            file_put_contents(sprintf('%s/%s', $providerDirectory, $file), $content);
        }
    }

    /**
     * @throws DomainExistsException
     */
    public function checkIfDomainExists(string $domainDirectory): void
    {
        if (file_exists($domainDirectory))
            throw new DomainExistsException();
    }

    private function replaceContents(string $content, string $domainName): string
    {
        if (str_contains($content, '{{domain}}'))
            $content = str_replace('{{domain}}', $domainName, $content);

        if (str_contains($content, '{{domainName}}'))
            $content = str_replace('{{domainName}}', camelCaseToPointCase($domainName), $content);

        if (str_contains($content, '{{domainPrefix}}'))
            $content = str_replace('{{domainPrefix}}', camelCaseToDashCase($domainName), $content);

        return $content;
    }

    /**
     * @return array
     */
    public function getProvidersStubs(): array
    {
        return [
            '{{domain}}RouteProvider.php' => DomainFileStubEnum::ROUTE->stub(),
            '{{domain}}ServiceProvider.php' => DomainFileStubEnum::SERVICE->stub()
        ];
    }

    public function createFolder(string $folderName): void
    {
        mkdir($folderName);
    }
}
