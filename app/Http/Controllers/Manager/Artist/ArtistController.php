<?php

namespace App\Http\Controllers\Manager\Artist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Artist\AddArtistRequest;
use App\Http\Requests\Artist\UpdateArtistRequest;
use App\Models\Artist;
use App\Models\Track;
use App\Services\Artist\ArtistService;

class ArtistController extends Controller
{
    public function __construct(private ArtistService $artistService)
    {
    }

    public function index()
    {
        return view('manager.pages.artist.list', [
            'artists' => $this->artistService->list(),
        ]);
    }

    public function create()
    {
        return view('manager.pages.artist.create');
    }

    public function store(AddArtistRequest $request)
    {
        $artist = $this
            ->artistService
            ->store($request);

        return redirect()
            ->route('manager.artists.index')
            ->with(['message' => "Исполнитель $artist->name успешно добавлен"]);
    }

    public function show(Track $track)
    {
        //
    }

    public function edit(Artist $artist)
    {
        return view('manager.pages.artist.edit', [
            'artist' => $artist
        ]);
    }

    public function update(UpdateArtistRequest $request, Artist $artist)
    {
        $artist = $this
            ->artistService
            ->update($request, $artist);

        return redirect()
            ->route('manager.artists.index')
            ->with(['message' => "Исполнитель $artist->name успешно добавлен"]);
    }

    public function destroy(Artist $artist)
    {
        $this->artistService->delete($artist);

        return back()->with([
            'message' => "Артист $artist->name удален"
        ]);
    }
}
