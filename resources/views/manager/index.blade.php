@extends('layouts.manager.main')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong> Панель управления</strong></h1>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="{{route('manager.tracks.index')}}"><div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Треков</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="play-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">{{$tracksAll}}</h1>
                                        <div class="mb-0">
                                            <span class="text-muted">Всего в базе</span>
                                        </div>
                                    </div>
                                    </div></a>
                            </div>
                            <div class="col-sm-3">
                                <a href="{{route('manager.artists.index')}}"><div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Артистов</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="play-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">{{$artistsAll}}</h1>
                                        <div class="mb-0">
                                            <span class="text-muted">Всего в базе</span>
                                        </div>
                                    </div>
                                    </div></a>
                            </div>
                            <div class="col-sm-2">
                                <a href="{{route('manager.genres.index')}}"><div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Жанров</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="play-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">{{$genresAll}}</h1>
                                        <div class="mb-0">
                                            <span class="text-muted">Всего в базе</span>
                                        </div>
                                    </div>
                                    </div></a>
                            </div>
                            <div class="col-sm-2">
                                <a href="{{route('manager.playlists.index')}}"><div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Плейлистов</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="play-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">{{$playlistsAll}}</h1>
                                        <div class="mb-0">
                                            <span class="text-muted">Всего в базе</span>
                                        </div>
                                    </div>
                                    </div></a>
                            </div>
                            <div class="col-sm-2">
                                <a href="{{route('manager.categories.index')}}"><div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Категорий</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="play-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">{{$categoriesAll}}</h1>
                                        <div class="mb-0">
                                            <span class="text-muted">Всего в базе</span>
                                        </div>
                                    </div>
                                    </div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
