<?php

namespace App\Services\DomainService;

use App\Exceptions\Domain\DomainExistsException;
use App\Services\DomainService\Actions\NewDomain;
use App\Services\DomainService\Contracts\DomainServiceContract;

class DomainService implements DomainServiceContract
{
    public function __construct(
        private readonly NewDomain $newDomain
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

    public function newRequest(string $domain, string $name): string
    {
        return $name;
    }

    public function newController(string $domain, string $name): string
    {
        // TODO: Implement newController() method.
    }
}
