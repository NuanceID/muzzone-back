@extends('layouts.manager.main')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Добавить трек</strong></h1>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('manager.tracks.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group my-2">
                            <input name="name" placeholder="Название трэка" class="form-control"
                                   value="{{old('name') ?? ''}}">
                        </div>

                        <div class="form-group my-2">
                            <input name="bitrate" placeholder="Битрейт" class="form-control"
                                   value="{{old('bitrate') ?? ''}}">
                        </div>

                        <div class="form-group my-2">
                            <textarea class="form-control" name="description"
                                      placeholder="Описание">{{ old('description') }}</textarea>
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
                                         label="Исполнители"/>

                        <x-select-search entity="genre"
                                         name="genres_ids[]"
                                         :multiple="true"
                                         label="Жанры"/>

                        <x-select-search entity="category"
                                         name="categories_ids[]"
                                         :multiple="true"
                                         label="Категории"/>

                        <x-select-search entity="album"
                                         name="album_id"
                                         :multiple="false"
                                         label="Альбом"/>

                        <div class="form-group my-2">
                            <button type="submit" class="btn btn-primary">Добавить</button>
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

