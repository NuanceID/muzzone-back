<?php

declare(strict_types=1);

namespace App\Services\Playlist;

use App\Http\Requests\Playlist\AddPlaylistRequest;
use App\Http\Requests\Playlist\UpdatePlaylistRequest;
use App\Models\Category;
use App\Models\Playlist;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

final class PlaylistService
{
    public function __construct(private Playlist $model)
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
    public function store(AddPlaylistRequest $request): Playlist
    {
        $playlist = $this->model->create($request->only([
            'name',
            'description'
        ]));

        if ($request->has('cover')) {
            $playlist
                ->addMediaFromRequest('cover')
                ->toMediaCollection('cover');
        }

        $playlist->tracks()->sync($request->get('tracks_ids'));

        return $playlist;
    }

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function update(UpdatePlaylistRequest $request, Playlist $playlist): Category
    {
        $playlist = tap($playlist)->update($request->validated());

        if ($request->has('cover')) {
            $playlist
                ->clearMediaCollection('cover')
                ->addMediaFromRequest('cover')
                ->toMediaCollection('cover');
        }

        return $playlist;
    }

    public function delete(Playlist $playlist, bool $force = false): void
    {
        if ($force) {
            $playlist->forceDelete();
        }

        $playlist->delete();
    }
}
