<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class PlaylistFilter extends ModelFilter
{
    public $relations = [];

    public function name(string $name): self
    {
        return $this
            ->where('playlists.name', 'LIKE', '%' . $name . '%');
    }
}
