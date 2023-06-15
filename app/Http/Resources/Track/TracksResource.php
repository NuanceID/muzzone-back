<?php

namespace App\Http\Resources\Track;

use Illuminate\Http\Resources\Json\JsonResource;

class TracksResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'cover' => $this->resource->getSingleImageUrl(),
            'file' => $this->resource->getSingleMediaUrl()
        ];
    }
}
