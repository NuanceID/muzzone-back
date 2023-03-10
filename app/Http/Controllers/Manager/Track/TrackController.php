<?php

namespace App\Http\Controllers\Manager\Track;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTrackRequest;
use App\Http\Requests\Track\UpdateTrackRequest;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Track;
use App\Services\Track\TrackService;

class TrackController extends Controller
{
    public function __construct(private TrackService $trackService)
    {
    }

    public function index()
    {
        return view('manager.pages.track.list', [
            'tracks' => $this->trackService->list(),
        ]);
    }

    public function create()
    {
        return view('manager.pages.track.create', [
            'genres' => Genre::get(['id', 'name']),
            'artists' => Artist::get(['id', 'name']),
            'categories' => Category::get(['id', 'name']),
            'albums' => Album::get(['id', 'name'])
        ]);
    }

    public function store(AddTrackRequest $addTrackRequest)
    {
        $track = $this->trackService->store($addTrackRequest);

        return redirect()
            ->route('manager.tracks.index')
            ->with(['message' => "Трэк $track->name добавлен"]);
    }

    public function show(Track $track)
    {
        //
    }

    public function edit(Track $track)
    {
        return view('manager.pages.track.edit', [
            'track' => $track,
            'genres' => Genre::get(['id', 'name']),
            'artists' => Artist::get(['id', 'name']),
            'categories' => Category::get(['id', 'name']),
            'albums' => Album::get(['id', 'name'])
        ]);
    }

    public function update(UpdateTrackRequest $updateTrackRequest, Track $track)
    {
        $track = $this
            ->trackService
            ->update($updateTrackRequest, $track);

        return redirect()
            ->route('manager.tracks.index')
            ->with(['message' => "Трэк $track->name обновлен"]);
    }

    public function destroy(Track $track)
    {
        $this->trackService->delete($track);

        return back()->with([
            'message' => "Трек $track->name удален"
        ]);
    }
}
