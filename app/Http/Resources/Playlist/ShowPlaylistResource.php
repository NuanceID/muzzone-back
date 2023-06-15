<?php

declare(strict_types=1);

namespace App\Http\Resources\Playlist;

use App\Http\Resources\Track\TracksResource;

class ShowPlaylistResource extends BasePlaylistResource
{
    public function toArray($request): array
    {
        $data =  parent::toArray($request);

        $data['tracks'] = TracksResource::collection($this->resource->tracks);

        return  $data;
    }
}
