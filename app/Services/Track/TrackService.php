<?php

declare(strict_types=1);

namespace App\Services\Track;

use App\Http\Requests\AddTrackRequest;
use App\Http\Requests\Track\UpdateTrackRequest;
use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Pagination\LengthAwarePaginator;

final class TrackService
{
    public function list(): LengthAwarePaginator
    {
        return Track::filter(request()->query())
            ->with([
                'artists',
                'genres',
                'album'
            ])
            ->paginate();
    }

    public function store(AddTrackRequest $request): Track
    {
        $track = Track::create(
            $request->only([
                'name',
                'description',
                'bitrate',
                'album_id'
            ])
        );

        $track
            ->genres()
            ->sync($request->get('genres_ids'));

        $track
            ->artists()
            ->sync($request->get('artists_ids'));

        $track
            ->categories()
            ->sync($request->get('categories_ids'));

        $track->addMediaFromRequest('cover')
            ->toMediaCollection('cover');

        $track->addMediaFromRequest('file')
            ->toMediaCollection('file');

        return $track;
    }

    public function update(UpdateTrackRequest $request, Track $track): Track
    {
        $track->update(
            $request->only([
                'name',
                'description',
                'bitrate',
                'album_id'
            ])
        );

        $track
            ->genres()
            ->sync($request->get('genres_ids'));

        $track
            ->artists()
            ->sync($request->get('artists_ids'));

        $track
            ->categories()
            ->sync($request->get('categories_ids'));

        if ($request->has('cover')) {
            $track
                ->clearMediaCollection('cover')
                ->addMediaFromRequest('cover')
                ->toMediaCollection('cover');
        }

        if ($request->has('file')) {
            $track
                ->clearMediaCollection('file')
                ->addMediaFromRequest('file')
                ->toMediaCollection('file');
        }

        return $track;
    }

    public function delete(Playlist $track, bool $force = false): void
    {
        if ($force) {
            $track->forceDelete();
        }

        $track->delete();
    }
}
