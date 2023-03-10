<?php

declare(strict_types=1);

namespace App\Services\Album;

use App\Http\Requests\Album\AddAlbumRequest;
use App\Http\Requests\Album\UpdateAlbumRequest;
use App\Models\Album;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

final class AlbumService
{
    public function __construct(private Album $model)
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
    public function store(AddAlbumRequest $request): Album
    {
        $album = $this->model->create($request->validated());

        if ($request->has('cover')) {
            $album
                ->addMediaFromRequest('cover')
                ->toMediaCollection('cover');
        }

        return $album;
    }

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function update(UpdateAlbumRequest $request, Album $album): Album
    {
        /** @var Album $album */
        $album = tap($album)->update($request->validated());

        if ($request->has('cover')) {
            $album
                ->clearMediaCollection('cover')
                ->addMediaFromRequest('cover')
                ->toMediaCollection('cover');
        }

        return $album;
    }

    public function delete(Album $album, bool $force = false): void
    {
        if ($force) {
            $album->forceDelete();
        }

        $album->delete();
    }
}
