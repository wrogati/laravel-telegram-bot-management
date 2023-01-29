<?php

namespace App\Console\Commands;

use App\Services\DomainService\DomainService;
use Exception;
use Illuminate\Console\Command;

class CreateDomain extends Command
{
    protected $signature = 'domain {action} {domain} {file?}';

    protected $description = 'Create a new domain';

    public function __construct(private readonly DomainService $service)
    {
        parent::__construct();
    }

    /**
     * @throws Exception
     */
    public function handle(): int
    {
        $action = $this->argument('action');
        $domainName = $this->argument('domain');
        $file = $this->argument('file');

        try {
            $response = match ($action) {
                'new' => ['action' => 'Domain', 'path' => $this->service->newDomain(ucfirst((string)$domainName))],
                'new-request' => ['action' => 'Request', 'path' => $this->createRequest($domainName, $file)],
                'new-controller' => ['action' => 'Controller', 'path' => $this->createController($domainName, $file)],
                default => throw new Exception('Invalid action for domain.')
            };
        } catch (Exception $exception) {
            $this->error($exception->getMessage());

            return Command::FAILURE;
        }

        $this->info(sprintf('%s created in: %s.', $response['action'], $response['path']));

        return Command::SUCCESS;
    }

    /**
     * @throws Exception
     */
    public function createRequest(string $domainName, ?string $file): string
    {
        $this->checkIfIsValidFileName($file);

        return $this->service->newRequest(ucfirst($domainName), $file);
    }

    /**
     * @throws Exception
     */
    public function createController(string $domainName, ?string $file): string
    {
        $this->checkIfIsValidFileName($file);

        return $this->service->newController(ucfirst($domainName), $file);
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
