@extends('layouts.manager.main')
@section('content')
    <main class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Обновить категорию</h3>
                        </div>
                        <img class="card-img" src="{{$category->getSingleImageUrl()}}" alt=".">
                        <div class="card-body">
                            <form action="{{ route('manager.categories.update', ['category' => $category->id]) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group my-2">
                                    <label>Название</label>
                                    <input type="text" class="form-control" name="name"
                                           value="{{old('name') ?? $category->name }}">
                                </div>

                                <div class="form-group my-2">
                                    <label>Описание</label>
                                    <textarea class="form-control"
                                              name="description">{{ old('description') ?? $category->description  }}</textarea>
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
