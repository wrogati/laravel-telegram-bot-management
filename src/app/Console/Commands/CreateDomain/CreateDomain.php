<?php

namespace App\Console\Commands\CreateDomain;

use App\Enums\DDDFoldersEnum;
use Exception;
use Illuminate\Console\Command;

class CreateDomain extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'new-domain {domain}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new domain';

    /**
     * @throws Exception
     */
    public function handle(): int
    {
        $domainName = $this->argument('domain');

        if (!$this->createDomainFolderStucture(ucfirst((string)$domainName)))
            throw new Exception('b');

        return Command::SUCCESS;
    }

    /**
     * @throws Exception
     */
    private function createDomainFolderStucture(string $domainName): bool
    {
        chdir('/var/www/html');
        $baseDirectory = sprintf('%s/%s/%s', getcwd(), 'TelegramBot', $domainName);

        if (file_exists($baseDirectory))
            throw new Exception('a');

        mkdir($baseDirectory);
        chdir($baseDirectory);

        foreach (DDDFoldersEnum::all() as $folder) {
            mkdir($folder);
        }

        $this->createFiles($baseDirectory, $domainName);

        return true;
    }

    /**
     * @throws Exception
     */
    private function createFiles(string $baseDirectory, string $domainName)
    {
        $currentDirectory = __DIR__;

        $this->createDomainFile($baseDirectory, $domainName, $currentDirectory);

        $this->createProviders($baseDirectory, $domainName, $currentDirectory);
    }

    public function getProvidersStubs(string $currentDirectory): array
    {
        $routeProvider = file_get_contents(sprintf('%s/%s', $currentDirectory, 'Files/DomainRouteProvider.stub'));
        $serviceProvider = file_get_contents(sprintf('%s/%s', $currentDirectory, 'Files/DomainServiceProvider.stub'));

        return ['{{domain}}RouteProvider.php' => $routeProvider, '{{domain}}ServiceProvider.php' => $serviceProvider];
    }

    public function createProviders(string $baseDirectory, string $domainName, string $currentDirectory): void
    {
        $providers = $this->getProvidersStubs($currentDirectory);

        $baseDirectory = sprintf('%s/%s', $baseDirectory, 'Infrastructure/Providers');

        if (file_exists($baseDirectory))
            throw new Exception('c');

        mkdir($baseDirectory);
        chdir($baseDirectory);

        foreach ($providers as $file => $provider) {
            if (str_contains($provider, '{{domain}}'))
                $provider = str_replace('{{domain}}', $domainName, $provider);

            if (str_contains($provider, '{{domainName}}'))
                $provider = str_replace('{{domainName}}', camelCaseToPointCase($domainName), $provider);

            if (str_contains($provider, '{{domainPrefix}}'))
                $provider = str_replace('{{domainPrefix}}', camelCaseToDashCase($domainName), $provider);

            $file = str_replace('{{domain}}', $domainName, $file);
            file_put_contents($file, $provider);
        }
    }

    private function createDomainFile(string $baseDirectory, string $domainName, string $currentDirectory)
    {
        $domain = $this->getDomainFileStub($currentDirectory);

        $domain = str_replace('{{domain}}', $domainName, $domain);

        file_put_contents(sprintf('%s/%s', $baseDirectory, 'Domain.php'), $domain);
    }

    public function getDomainFileStub(string $currentDirectory): string
    {
        return file_get_contents(sprintf('%s/%s', $currentDirectory, 'Files/Domain.stub'));
    }
}
