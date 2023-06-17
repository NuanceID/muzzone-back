<?php

namespace App\Http\Resources\Category;


use App\Http\Resources\Track\TracksResource;

class ShowCategoryResource extends BaseCategoryResource
{
    public function toArray($request): array
    {
        $data = parent::toArray($request);

        $data['tracks'] = TracksResource::collection($this->resource->tracks);

        return  $data;
    }
}
