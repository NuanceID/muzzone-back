@extends('layouts.manager.main')
@section('content')
    <main class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Обновить жанр</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('manager.genres.update', ['genre' => $genre->id]) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <img class="card-img" src="{{$genre->getSingleImageUrl()}}" alt=".">
                                <div class="form-group">
                                    <label>Родительский жанр</label>
                                    @php
                                        $thisGenre = $genre;
                                    @endphp
                                    <select class="form-select" name="genre_id">
                                        <option selected></option>
                                        @foreach($genres as $genre)
                                            <option @selected($thisGenre->subGenre()->is($genre)) value="{{ $genre->id }}">{{ $genre->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group my-2">
                                    <label>Название</label>
                                    <input type="text" class="form-control" name="name"
                                           value="{{old('name') ?? $thisGenre->name }}">
                                </div>

                                <div class="form-group my-2">
                                    <label>Описание</label>
                                    <textarea class="form-control"
                                              name="description">{{old('description') ?? $thisGenre->description }}</textarea>
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
