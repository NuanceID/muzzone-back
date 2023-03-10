@extends('layouts.manager.main')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Жанры</strong></h1>
            <div class="my-2">
                <a href="{{route('manager.genres.create')}}" class="btn btn-success">Добавить жанр</a>
            </div>
            @if(session('message'))
                <div class="alert alert-info my-2">{{session('message')}}</div>
            @endif
            <table class="table">
                <th>#</th>
                <th>Обложка</th>
                <th>Имя</th>
                <th>Родительский жанр</th>
                <th>Количество треков</th>
                <th>Дата создания</th>
                <th>Дата обновления</th>
                <th>Действия</th>

                @foreach($genres as $genre)
                    <tr>
                        <td>{{$genre->id}}</td>
                                                <td>
                                                    <x-single-image :url="$genre->getSingleImageUrl()"/>
                                                </td>
                                                <td>{{$genre->name}}</td>
                        <td>
                            @if($genre->subGenre)
                                <a href="{{route('manager.genres.edit', ['genre' => $genre->subGenre->id])}}">
                                    {{$genre->subGenre->name}}
                                </a>
                            @else
                                Нет
                            @endif
                        </td>
                        <td>{{$genre->tracks_count}}</td>
                        <td>{{$genre->created_at}}</td>
                        <td>{{$genre->updated_at}}</td>
                        <td>
                            <x-action-buttons-component entity="genre" :entity-id="$genre->id"/>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$genres->links()}}
        </div>
    </main>
@endsection
