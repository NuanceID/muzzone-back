@extends('layouts.manager.main')
@section('content')
    <main class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Обновить альбом</h3>
                        </div>
                        <img class="card-img" src="{{$album->getSingleImageUrl()}}" alt=".">
                        <div class="card-body">
                            <form action="{{ route('manager.albums.update', ['album' => $album->id]) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <x-select-search entity="artist"
                                                 name="artist_id"
                                                 label="Список исполнителей"
                                                 :multiple="false"
                                                 :options="$album->artist"/>

                                <div class="form-group my-2">
                                    <label>Название</label>
                                    <input type="text" class="form-control" name="name"
                                           value="{{old('name') ?? $album->name }}">
                                </div>

                                <div class="form-group my-2">
                                    <label>Название</label>
                                    <input type="number" class="form-control" name="year"
                                           value="{{old('year') ?? $album->year }}">
                                </div>

                                <div class="form-group my-2">
                                    <label>Описание</label>
                                    <textarea class="form-control"
                                              name="description">{{ old('description') ?? $album->description  }}</textarea>
                                </div>
                                <label>Картинка</label>
                                <div class="form-group my-2">
                                    <input type="file" name="cover" class="form-control">
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
            </div>
        </div>
    </main>
@endsection
