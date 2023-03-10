@extends('layouts.manager.main')
@section('content')
    <main class="content" x-data="{search: ''}">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Плейлисты</strong></h1>
            <div class="my-2">
                <a href="{{route('manager.playlists.create')}}" class="btn btn-success">Добавить плейлист</a>
            </div>
            @if(session('message'))
                <div class="alert alert-info my-2">{{session('message')}}</div>
            @endif
            <table class="table">
                <th>#</th>
                <th>Обложка</th>
                <th>Имя</th>
                <th>Количество треков</th>
                <th>Дата создания</th>
                <th>Дата обновления</th>
                <th>Действия</th>

                @foreach($playlists as $playlist)
                    <tr>
                        <td>{{$playlist->id}}</td>
                        <td>
                            <x-single-image :url="$playlist->getSingleImageUrl()"/>
                        </td>
                        <td>{{$playlist->name}}</td>
                        <td>{{$playlist->tracks_count}}</td>
                        <td>{{$playlist->created_at}}</td>
                        <td>{{$playlist->updated_at}}</td>
                        <td>
                            <x-action-buttons-component entity="playlist" :entity-id="$playlist->id"/>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$playlists->links()}}
        </div>
    </main>
@endsection
