<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Playlist;

use App\Http\Resources\Playlist\IndexPlaylistResource;
use App\Http\Resources\Playlist\ShowPlaylistResource;
use App\Models\Playlist;
use App\Services\Playlist\PlaylistService;

class PlaylistController
{
    public function __construct(private PlaylistService $playlistService)
    {
    }

    public function index()
    {
        $playlists = $this->playlistService->list();

        return IndexPlaylistResource::collection($playlists);
    }

    public function show(Playlist $playlist)
    {
        return ShowPlaylistResource::make($playlist);
    }
}
