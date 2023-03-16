<?php

namespace App\Http\Resources\Playlist;

use App\Http\Resources\Album\BaseAlbumResource;
use App\Http\Resources\Artist\BaseArtistResource;
use App\Http\Resources\Track\IndexTrackResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BasePlaylistResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'cover' => $this->resource->getSingleImageUrl(),
            'tracks' => IndexTrackResource::collection($this->resource->tracks)
        ];
    }
}
