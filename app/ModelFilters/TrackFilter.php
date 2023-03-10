<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class TrackFilter extends ModelFilter
{
    public $relations = ['artists'];

    public function name()
    {
        return $this->where('tracks.name');
    }
}
