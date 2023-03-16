<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class GenreFilter extends ModelFilter
{
    public $relations = [];

    public function name(string $name): self
    {
        return $this
            ->where('genres.name', 'LIKE', '%' . $name . '%');
    }

    public function description(string $description): self
    {
        return $this
            ->where('genres.description', 'LIKE', '%' . $description . '%');
    }
}
