<?php

namespace App\Http\Resources\Album;

use App\Http\Resources\Track\IndexTrackResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseAlbumResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'cover' => $this->resource->getSingleImageUrl()
        ];
    }
}
