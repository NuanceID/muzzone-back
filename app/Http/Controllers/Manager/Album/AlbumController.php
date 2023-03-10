<?php

namespace App\Http\Controllers\Manager\Album;

use App\Http\Controllers\Controller;
use App\Http\Requests\Album\AddAlbumRequest;
use App\Http\Requests\Album\UpdateAlbumRequest;
use App\Models\Album;
use App\Models\Artist;
use App\Services\Album\AlbumService;

class AlbumController extends Controller
{
    public function __construct(private AlbumService $albumService)
    {
    }

    public function index()
    {
        return view('manager.pages.album.list', [
            'albums' => $this->albumService->list(),
        ]);
    }

    public function create()
    {
        return view('manager.pages.album.create', [
            'artists' => Artist::get(['id', 'name'])
        ]);
    }

    public function store(AddAlbumRequest $request)
    {
        $album = $this
            ->albumService
            ->store($request);

        return redirect()
            ->route('manager.albums.index')
            ->with(['message' => "Альбом $album->name успешно добавлен"]);
    }

    public function edit(Album $album)
    {
        return view('manager.pages.album.edit', [
            'album' => $album,
            'artists' => Artist::get(['id', 'name'])
        ]);
    }

    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $album = $this
            ->albumService
            ->update($request, $album);

        return redirect()
            ->route('manager.albums.index')
            ->with(['message' => "Альбом $album->name успешно добавлен"]);
    }

    public function destroy(Album $album)
    {
        $this->albumService->delete($album);

        return back()->with([
            'message' => "Категория $album->name удалена"
        ]);
    }
}
