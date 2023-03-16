@extends('layouts.manager.main')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Треки</strong></h1>
            <div>
                <a href="{{route('manager.tracks.create')}}" class="btn btn-success">Добавить трек</a>
            </div>
            <table class="table">
                <th>#</th>
                <th>Картинка</th>
                <th>Название</th>
                <th>Битрейт</th>
                <th>Альбом</th>
                <th>Прослушать</th>
                <th>Дата добавления</th>
                <th>Дата обновления</th>
                <th>Действия</th>
                @foreach($tracks as $track)
                    <tr>
                        <td>{{$track->id}}</td>
                        <td>
                            <x-single-image :url="$track->getSingleImageUrl()"/>
                        </td>
                        <td>{{$track->name}}</td>
                        <td>{{$track->bitrate}}</td>
                        <td>
                            <a href="{{route('manager.albums.edit', ['album' => $track->album->id])}}">
                                {{$track->album->name}}
                            </a>
                        </td>
                        <td>
                            <a href="{{$track->getSingleMediaUrl()}}">Прослушать</a>
                        </td>
                        <td>{{$track->created_at}}</td>
                        <td>{{$track->updated_at}}</td>
                        <td>
                            <x-action-buttons-component entity="track" :entity-id="$track->id"/>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$tracks->links()}}
        </div>
    </main>
@endsection
