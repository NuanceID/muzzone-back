<?php

namespace App\Http\Controllers\Manager\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\Genre\AddGenreRequest;
use App\Http\Requests\Genre\UpdateGenreRequest;
use App\Models\Genre;
use App\Models\Playlist;
use App\Services\Genre\GenreService;

class GenreController extends Controller
{
    public function __construct(private GenreService $genreService)
    {
    }

    public function index()
    {
        return view('manager.pages.genre.list', [
            'genres' => $this->genreService->list(),
        ]);
    }

    public function create()
    {
        return view('manager.pages.genre.create', [
            'genres' => Genre::get(['id', 'name'])
        ]);
    }

    public function store(AddGenreRequest $request)
    {
        $artist = $this
            ->genreService
            ->store($request);

        return redirect()
            ->route('manager.genres.index')
            ->with(['message' => "Жанр $artist->name успешно добавлен"]);
    }

    public function edit(Genre $genre)
    {
        return view('manager.pages.genre.edit', [
            'genre' => $genre,
            'genres' => Genre::get(['id', 'name'])
        ]);
    }

    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $genre = $this
            ->genreService
            ->update($request, $genre);

        return redirect()
            ->route('manager.genres.index')
            ->with(['message' => "Жанр $genre->name успешно обновлен"]);
    }

    public function destroy(Genre $genre)
    {
        $this->genreService->delete($genre);

        return back()->with([
            'message' => "Жанр $genre->name удален"
        ]);
    }
}
