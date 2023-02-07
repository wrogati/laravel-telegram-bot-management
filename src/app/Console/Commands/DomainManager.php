<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use TelegramBot\DomainManager\Domain\Enums\ResourceMakerEnum;
use TelegramBot\DomainManager\Domain\Services\DomainManagerService\Interfaces\DomainManagerInterface;

class DomainManager extends Command
{
    protected $signature = 'domain {action} {domainName} {className?}';
    protected $description = 'This commando can create resources (controllers, requests, resources, repositories)
    in domain.';

    public function __construct(private readonly DomainManagerInterface $domainManager)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $action = $this->argument('action');
        $domainName = $this->argument('domainName');
        $className = $this->argument('className');

        $this->domainManager->setMaker(ResourceMakerEnum::getByAction($action));

        try {
            $response = $this->domainManager->handle(ucfirst($domainName), ucfirst($className) ?? null);
        } catch (\Exception $exception) {
            $this->error($exception->getMessage());

            return self::FAILURE;
        }

        $this->info(sprintf('%s was created in: %s', $response->type, $response->path));

        return self::SUCCESS;
    }
}
