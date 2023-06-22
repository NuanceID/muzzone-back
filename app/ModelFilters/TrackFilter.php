<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class TrackFilter extends ModelFilter
{
    public $relations = [
        'artists' => [
            'artists_ids'
        ],
        'album' => [
            'album_id'
        ]
    ];

    public function name(string $name): self
    {
        return $this
            ->where('tracks.name', 'LIKE', '%' . $name . '%');
    }

    public function description(string $description): self
    {
        return $this
            ->where('tracks.description', 'LIKE', '%' . $description . '%');
    }

    public function albumId(int $artistId): self
    {
        return $this
            ->where('tracks.artist_id', $artistId);
    }

    public function artistsIds(array $artistsIds)
    {
        $this->related('artists', 'artists.id', $artistsIds);
    }

    public function genresIds(array $genresIds)
    {
        $this->related('genres', 'genres.id', $genresIds);
    }

    public function categoriesIds(array $categoriesIds)
    {
        $this->related('categories', 'categories.id', $categoriesIds);
    }
}
