<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Genre;

use App\Http\Resources\Genre\IndexGenreResource;
use App\Http\Resources\Genre\ShowGenreResource;
use App\Models\Genre;
use App\Services\Genre\GenreService;

class GenreController
{
    public function __construct(private GenreService $genreService)
    {
    }

    public function index()
    {
        $genres = $this->genreService->list();

        return IndexGenreResource::collection($genres);
    }

    public function show(Genre $genre)
    {
        return ShowGenreResource::make($genre);
    }
}
