@extends('layouts.manager.main')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Альбомы</strong></h1>
            <div class="my-2">
                <a href="{{route('manager.albums.create')}}" class="btn btn-success">Добавить альбом</a>
            </div>
            @if(session('message'))
                <div class="alert alert-info my-2">{{session('message')}}</div>
            @endif
            <table class="table">
                <th>#</th>
                <th>Обложка</th>
                <th>Имя</th>
                <th>Исполнитель</th>
                <th>Количество треков</th>
                <th>Дата создания</th>
                <th>Дата обновления</th>
                <th>Действия</th>

                @foreach($albums as $album)
                    <tr>
                        <td>{{$album->id}}</td>
                        <td>
                            <x-single-image :url="$album->getSingleImageUrl()"/>
                        </td>
                        <td>{{$album->name}}</td>
                        <td>
                            <a href="{{route('manager.artists.edit', ['artist' => $album->artist?->id])}}">
                                {{$album->artist?->name}}
                            </a>
                        </td>
                        <td>{{$album->tracks_count}}</td>
                        <td>{{$album->created_at}}</td>
                        <td>{{$album->updated_at}}</td>
                        <td>
                            <x-action-buttons-component entity="album" :entity-id="$album->id"/>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$albums->links()}}
        </div>
    </main>
@endsection
