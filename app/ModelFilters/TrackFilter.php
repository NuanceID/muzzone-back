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

    public function name(string $name): TrackFilter
    {
        return $this
            ->where('tracks.name', 'LIKE', '%' . $name . '%');
    }

    public function description(string $description): TrackFilter
    {
        return $this
            ->where('tracks.description', 'LIKE', '%' . $description . '%');
    }

    public function albumId(int $albumId): TrackFilter
    {
        return $this
            ->where('tracks.album_id', $albumId);
    }

    public function artistsIds(array $artistsIds): TrackFilter
    {
        return $this->related('artists', 'artists.id', $artistsIds);
    }

    public function genresIds(array $genresIds): TrackFilter
    {
        return $this->related('genres', 'genres.id', $genresIds);
    }

    public function categoriesIds(array $categoriesIds): TrackFilter
    {
        return $this->related('categories', 'categories.id', $categoriesIds);
    }
}
