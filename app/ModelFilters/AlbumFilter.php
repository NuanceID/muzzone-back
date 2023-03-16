<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class AlbumFilter extends ModelFilter
{
    public $relations = [
        'artist' => [
            'artist_id'
        ],
        'tracks' => [
            'tracks_ids'
        ]
    ];

    public function name(string $name): self
    {
        return $this
            ->where('name', 'LIKE', '%' . $name . '%');
    }

    public function year(int $year): self
    {
        return $this
            ->where('year', $year);
    }

    public function description(string $description): self
    {
        return $this
            ->where('description', 'LIKE', '%' . $description . '%');
    }

    public function artistId(int $artistId): self
    {
        return $this
            ->where('artist_id', $artistId);
    }
}
