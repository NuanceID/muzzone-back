<?php

namespace App\Http\Controllers\Manager\Playlist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Playlist\AddPlaylistRequest;
use App\Http\Requests\Playlist\UpdatePlaylistRequest;
use App\Models\Playlist;
use App\Models\Track;
use App\Services\Playlist\PlaylistService;

class PlayListController extends Controller
{
    public function __construct(private PlaylistService $playlistService)
    {
    }

    public function index()
    {
        return view('manager.pages.playlist.list', [
            'playlists' => $this->playlistService->list(),
        ]);
    }

    public function create()
    {
        return view('manager.pages.playlist.create', [
            'tracks' => Track::get(['id', 'name'])
        ]);
    }

    public function store(AddPlaylistRequest $request)
    {
        $playlist = $this
            ->playlistService
            ->store($request);

        return redirect()
            ->route('manager.playlists.index')
            ->with(['message' => "Плейлист $playlist->name успешно добавлена"]);
    }

    public function edit(Playlist $playlist)
    {
        return view('manager.pages.playlist.edit', [
            'playlist' => $playlist,
            'tracks' => Track::get(['id', 'name'])
        ]);
    }

    public function update(UpdatePlaylistRequest $request, Playlist $playlist)
    {
        $playlist = $this
            ->playlistService
            ->update($request, $playlist);

        return redirect()
            ->route('manager.playlists.index')
            ->with(['message' => "Плейлист $playlist->name успешно обновлен"]);
    }

    public function destroy(Playlist $playlist)
    {
        $this->playlistService->delete($playlist);

        return back()->with([
            'message' => "Плейлист $playlist->name удален"
        ]);
    }
}
