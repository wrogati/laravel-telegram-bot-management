<?php

namespace App\Console\Commands;

use App\Services\DomainService\DomainService;
use Exception;
use Illuminate\Console\Command;

class CreateDomain extends Command
{
    protected $signature = 'domain {action} {domain} {file?}';

    protected $description = 'Create a new domain';

    /**
     * @throws Exception
     */
    public function handle(DomainService $service): int
    {
        $action = $this->argument('action');
        $domainName = $this->argument('domain');
        $file = $this->argument('file');

        try {
            $domainPath = match ($action) {
                'new' => $service->newDomain(ucfirst((string)$domainName)),
                'new-request' => $this->createRequest($service, $domainName, $file),
                'new-controller' => $this->createController($service, $domainName, $file),
                default => throw new Exception('Invalid action for domain.')
            };
        } catch (Exception $exception) {
            $this->error($exception->getMessage());

            return Command::FAILURE;
        }

        $action = match ($action) {
            'new' => 'Domain',
            'new-request' => 'Request',
            'new-controller' => 'Controller',
        };

        $this->info(sprintf('%s created in: %s.', $action, $domainPath));

        return Command::SUCCESS;
    }

    /**
     * @throws Exception
     */
    public function createRequest(DomainService $service, string $domainName, ?string $file): string
    {
        $this->checkIfIsValidFileName($file);

        return $service->newRequest(ucfirst($domainName), $file);
    }

    /**
     * @throws Exception
     */
    public function createController(DomainService $service, string $domainName, ?string $file): string
    {
        $this->checkIfIsValidFileName($file);

        return $service->newController(ucfirst($domainName), $file);
    }

    /**
     * @throws Exception
     */
    public function checkIfIsValidFileName(?string $file): void
    {
        if (is_null($file))
            throw new Exception('Invalida file name');
    }
}
