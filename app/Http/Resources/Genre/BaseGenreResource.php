<?php

namespace App\Http\Resources\Genre;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseGenreResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'cover' => $this->resource->getSingleImageUrl(),
        ];
    }
}
