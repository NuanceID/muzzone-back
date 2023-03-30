<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Artist;

use App\Http\Resources\Artist\IndexArtistResource;
use App\Http\Resources\Artist\ShowArtistResource;
use App\Models\Artist;
use App\Services\Artist\ArtistService;

class ArtistController
{
    public function __construct(private ArtistService $artistService)
    {
    }

    public function index()
    {
        $artists = $this->artistService->list();

        return IndexArtistResource::collection($artists);
    }

    public function show(Artist $artist)
    {
        return ShowArtistResource::make($artist);
    }
}
