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

                        <x-select-search entity="artist"
                                         name="artists_ids[]"
                                         :multiple="true"
                                         label="Исполнители"
                                         :options="$track->artists"/>

                        <x-select-search entity="genre"
                                         name="genres_ids[]"
                                         :multiple="true"
                                         label="Жанры"
                                         :options="$track->genres"/>

                        <x-select-search entity="category"
                                         name="categories_ids[]"
                                         :multiple="true"
                                         label="Категории"
                                         :options="$track->categories"/>

                        <x-select-search entity="album"
                                         name="album_id"
                                         :multiple="false"
                                         label="Альбом"
                                         :options="$track->album"/>

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

