<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ArtistFilter extends ModelFilter
{
    public $relations = [];

    public function name(string $name)
    {
        return $this->query->where('artists.name', 'LIKE', '%' . $name . '%');
    }
}
