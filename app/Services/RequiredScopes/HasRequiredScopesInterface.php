<?php

declare(strict_types=1);

namespace App\Services\RequiredScopes;

interface HasRequiredScopesInterface
{
    public function getRequiredScopes(): array;
}
