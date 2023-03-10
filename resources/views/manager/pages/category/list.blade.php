@extends('layouts.manager.main')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Категории</strong></h1>
            <div class="my-2">
                <a href="{{route('manager.categories.create')}}" class="btn btn-success">Добавить категорию</a>
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

                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                                                <td>
                                                    <x-single-image :url="$category->getSingleImageUrl()"/>
                                                </td>
                                                <td>{{$category->name}}</td>
                        <td>{{$category->tracks_count}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>
                        <td>
                            <x-action-buttons-component entity="category" :entity-id="$category->id"/>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$categories->links()}}
        </div>
    </main>
@endsection
