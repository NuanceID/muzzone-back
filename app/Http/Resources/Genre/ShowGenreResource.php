<?php

declare(strict_types=1);

namespace App\Http\Resources\Genre;

use App\Http\Resources\Track\TracksResource;

class ShowGenreResource extends BaseGenreResource
{
    public function toArray($request): array
    {
        $data = parent::toArray($request);

        $data['tracks'] = TracksResource::collection($this->resource->tracks);

        return $data;
    }
}
