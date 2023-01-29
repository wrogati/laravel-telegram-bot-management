<?php

namespace App\Services\DomainService;

use App\Exceptions\Domain\DomainExistsException;
use App\Services\DomainService\Actions\NewDomain;
use App\Services\DomainService\Actions\NewRequest;
use App\Services\DomainService\Contracts\DomainServiceContract;

class DomainService implements DomainServiceContract
{
    public function __construct(
        private readonly NewDomain $newDomain,
        private readonly NewRequest $newRequest
    )
    {
    }

    /**
     * @throws DomainExistsException
     */
    public function newDomain(string $name): string
    {
        return $this->newDomain->handle($name);
    }

    public function newRequest(string $domain, string $file): string
    {
        return $this->newRequest->handle($domain, $file);
    }

    public function newController(string $domain, string $name): string
    {
        // TODO: Implement newController() method.
    }
}
