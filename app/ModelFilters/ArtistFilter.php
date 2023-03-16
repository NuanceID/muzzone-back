<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ArtistFilter extends ModelFilter
{
    public $relations = [];

    public function name(string $name): self
    {
        return $this
            ->where('artists.name', 'LIKE', '%' . $name . '%');
    }

    public function description(string $description): self
    {
        return $this
            ->where('artists.description', 'LIKE', '%' . $description . '%');
    }
}
