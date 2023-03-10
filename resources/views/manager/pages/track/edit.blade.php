@extends('layouts.manager.main')
@section('content')
    <main class="content">
        <div class="container">
            <h1 class="h3 mb-3"><strong>Добавить трек</strong></h1>
            <div class="card">
                <img class="card-img" src="{{$track->getSingleImageUrl()}}" alt=".">
                <div class="card-body">
                    <form method="POST" action="{{route('manager.tracks.update', ['track' => $track])}}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group my-2">
                            <input name="name" placeholder="Название трэка" class="form-control"
                                   value="{{old('name') ?? $track->name}}">
                        </div>

                        <div class="form-group my-2">
                            <input name="bitrate" placeholder="Битрейт" class="form-control"
                                   value="{{old('bitrate') ?? $track->bitrate}}">
                        </div>

                        <div class="form-group my-2">
                            <textarea class="form-control" name="description"
                                      placeholder="Описание">{{ old('description') ?? $track->description }}</textarea>
                        </div>

                        <div class="form-group my-2">
                            <label>Картинка</label>
                            <input class="form-select" type="file" name="cover">
                        </div>

                        <div class="form-group my-2">
                            <label>Файл</label>
                            <input class="form-select" type="file" name="file">
                        </div>

                        <div class="form-group my-2">
                            <label>Исполнители</label>
                            <select class="form-select" name="artists_ids[]" multiple>
                                @foreach($artists as $artist)

                                    <option
                                        @selected(in_array($artist->id, $track->artists()->pluck('artists.id')->toArray())) value="{{$artist->id}}">{{$artist->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group my-2">
                            <label>Жанры</label>
                            <select class="form-select" name="genres_ids[]" multiple>
                                @foreach($genres as $genre)
                                    <option
                                        @selected(in_array($genre->id, $track->genres()->pluck('genres.id')->toArray())) value="{{$genre->id}}">{{$genre->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group my-2">
                            <label>Категории</label>
                            <select class="form-select" name="categories_ids[]" multiple>
                                @foreach($categories as $category)
                                    <option
                                        @selected(in_array($category->id, $track->categories()->pluck('categories.id')->toArray())) value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group my-2">
                            <label>Альбом</label>
                            <select class="form-select" name="album_id">
                                @foreach($albums as $album)
                                    <option
                                        @selected($track->album()->is($album)) value="{{$album->id}}">{{$album->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group my-2">
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </div>

                    </form>
                    @if($errors->any())
                        <x-errors-component :errors="$errors->all()"/>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection

