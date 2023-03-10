@extends('layouts.manager.main')
@section('content')
    <main class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Обновить исполнителя</h3>
                            </div>
                            <img class="card-img" src="{{$artist->getSingleImageUrl()}}" alt=".">
                            <div class="card-body">
                                <form action="{{ route('manager.artists.update', ['artist' => $artist->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group my-2">
                                        <input type="text" class="form-control" name="name" value="{{old('name') ?? $artist->name }}">
                                    </div>
                                    <div class="form-group my-2">
                                        <textarea class="form-control" name="description">{{ old('description') ?? $artist->description  }}</textarea>
                                    </div>
                                    <div class="form-group my-2">
                                        <input type="file" name="cover" class="form-control">
                                    </div>
                                    <div class="form-group my-2">
                                        <button type="submit" class="btn btn-primary">Обновить</button>
                                    </div>
                                </form>
                                @if($errors->any())
                                    <x-errors-component :errors="$errors->all()" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
