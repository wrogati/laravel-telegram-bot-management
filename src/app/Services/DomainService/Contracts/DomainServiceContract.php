<?php

namespace App\Services\DomainService\Contracts;

interface DomainServiceContract
{
    public function newDomain(string $name): string;

    public function newRequest(string $domain, string $name): string;

    public function newController(string $domain, string $name): string;
}
