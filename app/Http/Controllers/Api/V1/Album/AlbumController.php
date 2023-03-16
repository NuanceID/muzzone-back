<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Album;

use App\Http\Resources\Album\IndexAlbumResource;
use App\Http\Resources\Album\ShowAlbumResource;
use App\Models\Album;
use App\Services\Album\AlbumService;

class AlbumController
{
    public function __construct(private AlbumService $albumService)
    {
    }

    public function index()
    {
        $albums = $this->albumService->list();

        return IndexAlbumResource::collection($albums);
    }

    public function show(Album $album)
    {
        return ShowAlbumResource::make($album);
    }
}
