<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class CategoryFilter extends ModelFilter
{
    public $relations = [];

    public function name(string $name): self
    {
        return $this
            ->where('categories.name', 'LIKE', '%' . $name . '%');
    }

    public function description(string $description): self
    {
        return $this
            ->where('categories.description', 'LIKE', '%' . $description . '%');
    }
}
