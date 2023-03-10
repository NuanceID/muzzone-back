<?php

declare(strict_types=1);

namespace App\Services\Genre;

use App\Http\Requests\Genre\AddGenreRequest;
use App\Http\Requests\Genre\UpdateGenreRequest;
use App\Models\Genre;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

final class GenreService
{
    public function __construct(private Genre $model)
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
    public function store(AddGenreRequest $request): Genre
    {
        $genre = $this->model->create($request->validated());

        if ($request->has('cover')) {
            $genre
                ->addMediaFromRequest('cover')
                ->toMediaCollection('cover');
        }

        return $genre;
    }

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function update(UpdateGenreRequest $request, Genre $genre): Genre
    {
        $genre = tap($genre)->update($request->validated());

        if ($request->has('cover')) {
            $genre
                ->clearMediaCollection('cover')
                ->addMediaFromRequest('cover')
                ->toMediaCollection('cover');
        }

        return $genre;
    }

    public function delete(Genre $genre, bool $force = false): void
    {
        if ($force) {
            $genre->forceDelete();
        }

        $genre->delete();
    }
}
