@extends('layouts.manager.main')
@section('content')
    <main class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Добавить категорию</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('manager.categories.store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group my-2">
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="{{ old('name') }}" placeholder="Имя">
                                </div>
                                <div class="form-group my-2">
                                    <textarea class="form-control" name="description" id="description"
                                              placeholder="Описание">{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group my-2">
                                    <input type="file" name="cover" class="form-control">
                                </div>
                                <div class="form-group my-2">
                                    <button type="submit" class="btn btn-primary">Добавить</button>
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
