@extends('layouts.admin')
@section('content')


    <div class="d-grid">
        <a href="{{ route('admin.users.create') }}" class="btn btn-success">Добавить нового пользователя</a>
    </div>
    <div class="container container col-sm-12 col-md-12 col-lg-10 col-xl-8">

            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="hash" class="col-md-4 col-form-label text-md-right">Хэш</label>
                        <div class="col-md-6">
                            <input id="hash" type="text" class="form-control @error('hash') is-invalid @enderror"
                                   name="hash" value="{{ uniqid() }}" required autocomplete="hash" autofocus>
                            @error('hash')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="type" class="col-md-4 col-form-label text-md-right">Cтатус</label>
                        <div class="col-md-6">
                            <select name="status" id="status" class="form-control">
                                <option value="0">
                                    Неактив
                                </option>
                                <option value="1">
                                    Активный
                                </option>
                                <option value="2">
                                    Прошита
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="type" class="col-md-4 col-form-label text-md-right">Тип носителя</label>
                        <div class="col-md-6">
                            <select name="type" id="type" class="form-control">
                                <option value="0">
                                    --Выбрать--
                                </option>
                                <option value="1">
                                    Карта
                                </option>
                                <option value="2">
                                    Чип
                                </option>
                                <option value="3">
                                    К+Ч
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="type" class="col-md-4 col-form-label text-md-right">Комментарий</label>
                        <div class="col-md-6">
                            <textarea name="comment" id="comment" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <div class="col-md-6 offset-md-4 d-grid">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
