<?php

declare(strict_types=1);

namespace App\Services\Artist;

use App\Http\Requests\Artist\AddArtistRequest;
use App\Http\Requests\Artist\UpdateArtistRequest;
use App\Models\Artist;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

final class ArtistService
{
    public function __construct(private Artist $model)
    {
    }

    public function list(): LengthAwarePaginator
    {
        return $this
            ->model
            ->filter()
            ->withCount('tracks')
            ->paginate();
    }

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function store(AddArtistRequest $request): Artist
    {
        $artist = $this->model->create($request->validated());

        if ($request->has('cover')) {
            $artist
                ->clearMediaCollection('cover')
                ->addMediaFromRequest('cover')
                ->toMediaCollection('cover');
        }

        return $artist;
    }

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function update(UpdateArtistRequest $request, Artist $artist): Artist
    {
        $artist = tap($artist)->update($request->validated());

        if ($request->has('cover')) {
            $artist
                ->clearMediaCollection('cover')
                ->addMediaFromRequest('cover')
                ->toMediaCollection('cover');
        }

        return $artist;
    }

    public function delete(Artist $artist, bool $force = false): void
    {
        if ($force) {
            $artist->forceDelete();
        }

        $artist->delete();
    }
}
