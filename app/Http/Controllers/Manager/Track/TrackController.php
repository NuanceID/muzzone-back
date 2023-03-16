<?php

namespace App\Http\Controllers\Manager\Track;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTrackRequest;
use App\Http\Requests\Track\UpdateTrackRequest;
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
        return view('manager.pages.track.create');
    }

    public function store(AddTrackRequest $addTrackRequest)
    {
        $track = $this->trackService->store($addTrackRequest);

        return redirect()
            ->route('manager.tracks.index')
            ->with(['message' => "Трек $track->name добавлен"]);
    }

    public function edit(Track $track)
    {
        return view('manager.pages.track.edit', [
            'track' => $track
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
