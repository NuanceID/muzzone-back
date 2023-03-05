@extends('layouts.manager.unauthenticated')
@section('content')
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email"
                                               placeholder="Почта"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Пароль</label>
                                        <input class="form-control form-control-lg" type="password" name="password"
                                               placeholder="Пароль"/>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary w-100">Вход</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
