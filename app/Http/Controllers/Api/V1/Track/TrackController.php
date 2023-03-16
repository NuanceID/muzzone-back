<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Track;

use App\Http\Resources\Track\IndexTrackResource;
use App\Http\Resources\Track\ShowTrackResource;
use App\Models\Track;
use App\Services\Track\TrackService;

class TrackController
{
    public function __construct(private TrackService $trackService)
    {
    }

    public function index()
    {
        $tracks = $this->trackService->list();

        return IndexTrackResource::collection($tracks);
    }

    public function show(Track $track)
    {
        return ShowTrackResource::make($track);
    }
}
