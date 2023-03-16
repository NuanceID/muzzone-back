<?php

namespace App\Http\Resources\Track;

use App\Http\Resources\Album\BaseAlbumResource;
use App\Http\Resources\Album\ShowAlbumResource;
use App\Http\Resources\Artist\BaseArtistResource;
use App\Http\Resources\Artist\ShowArtistResource;
use App\Http\Resources\Genre\BaseGenreResource;
use App\Http\Resources\Genre\ShowGenreResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseTrackResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'cover' => $this->resource->getSingleImageUrl(),
            'file' => $this->resource->getSingleMediaUrl(),
            'album' => ShowAlbumResource::make($this->resource->album),
            'artists' => ShowArtistResource::collection($this->resource->artists),
            'genres' => ShowGenreResource::collection($this->resource->genres)
        ];
    }
}
