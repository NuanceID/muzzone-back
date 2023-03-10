<?php

declare(strict_types=1);

namespace App\Http\Controllers\Manager\Dashboard;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Track;

class DashboardController
{
    public function main()
    {
        return view('manager.index', $this->calculateStats());
    }

    public function calculateStats()
    {
        return [
            'tracksAll' => Track::count(),
            'tracksToday' => Track::whereCreatedAt(now())->count(),
            'artistsAll' => Artist::count(),
            'artistsToday' => Artist::whereCreatedAt(now())->count(),
            'albumsAll' => Album::count(),
            'albumsToday' => Album::whereCreatedAt(now())->count(),
            'genresAll' => Genre::count(),
            'genresToday' => Genre::whereCreatedAt(now())->count(),
            'categoriesAll' => Category::count(),
            'categoriesToday' => Category::whereCreatedAt(now())->count()
        ];
    }
}
