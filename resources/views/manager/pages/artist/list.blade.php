@extends('layouts.manager.main')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Исполнители</strong></h1>
            <div>
                <a href="{{route('manager.artists.create')}}" class="btn btn-success">Добавить исполнителя</a>
            </div>
            @if(session('message'))
                <div class="alert alert-info">{{session('message')}}</div>
            @endif
            <table class="table">
                <th>#</th>
                <th>Обложка</th>
                <th>Имя</th>
                <th>Количество треков</th>
                <th>Дата создания</th>
                <th>Дата обновления</th>
                <th>Действия</th>
                @foreach($artists as $artist)
                    <tr>
                        <td>{{$artist->id}}</td>
                        <td>
                            <x-single-image :url="$artist->getSingleImageUrl()"/>
                        </td>
                        <td>{{$artist->name}}</td>
                        <td>{{$artist->tracks_count}}</td>
                        <td>{{$artist->created_at}}</td>
                        <td>{{$artist->updated_at}}</td>
                        <td>
                            <x-action-buttons-component entity="artist" :entity-id="$artist->id"/>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$artists->links()}}
        </div>
    </main>
@endsection
