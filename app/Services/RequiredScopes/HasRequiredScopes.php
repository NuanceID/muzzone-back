<?php

declare(strict_types=1);

namespace App\Services\RequiredScopes;

use Illuminate\Database\Eloquent\Builder;

trait HasRequiredScopes
{
    public function initializeHasRequiredScopes(): void
    {
        foreach ($this->getRequiredScopes() as $scope) {
            static::addGlobalScope($scope, fn(Builder $builder) => $builder->scopes($scope));
        }
    }
}
