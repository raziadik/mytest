@extends('layouts.admin')
@section('content')

    <div class="container col-sm-12 col-md-10 col-lg-10 col-xl-8">
        <div class="d-grid mb-2">
            <a href="{{ route('admin.cutaway.contacts.create') }}" class="btn btn-primary">Добавить кнопку</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.cutaway.contacts.update', $item->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")

                    <div class="d-flex mb-2 justify-content-end">
                        <img class="contact-logo-img" style="height: 45px; background-color: #cccccc"
                             src="/{{ $item->logo }}" alt="logo">
                        <div class="m-2 col-sm-10 col-md-7 align-self-end">
                            <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror"
                                   name="logo">
                            @error('logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Название кнопки</label>
                        <div class="col-md-8">
                            <input id="title" type="text"
                                   class="form-control @error('title') is-invalid @enderror" name="title"
                                   value="{{ $item->title }}" autocomplete="title">

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="background_color" class="col-md-4 col-form-label text-md-right">Цвет фона</label>
                        <div class="col-md-8">
                            <input id="background_color" type="color"
                                   class="form-control @error('background_color') is-invalid @enderror"
                                   name="background_color" style="height: 40px" value="{{$item->background_color}}">
                            @error('background_color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="color" class="col-md-4 col-form-label text-md-right">Цвет текста</label>
                        <div class="col-md-8">
                            <input id="color" type="color"
                                   class="form-control @error('color') is-invalid @enderror" name="color"
                                   style="height: 40px" value="{{$item->color}}">
                            @error('color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="main_link" class="col-md-4 col-form-label text-md-right">Ссылка</label>
                        <div class="col-md-8">
                            <input id="main_link" type="text" class="form-control @error('main_link') is-invalid @enderror" name="main_link" value="{{ $item->main_link }}" autocomplete="main_link">
                            @error('main_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="main_text" class="col-md-4 col-form-label text-md-right">Текст с объяснением</label>
                        <div class="col-md-8">
                            <input id="main_text" type="text" class="form-control @error('main_text') is-invalid @enderror" name="main_text" value="{{ $item->main_text }}" autocomplete="main_text">
                            @error('main_text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="example" class="col-md-4 col-form-label text-md-right">Пример внутри строки</label>
                        <div class="col-md-8">
                            <input id="example" type="text" class="form-control @error('example') is-invalid @enderror" name="example" value="{{ $item->example }}" autocomplete="example">
                            @error('example')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>
                </form>

                <a href="{{ route('admin.cutaway.contacts.show', $item->id) }}"
                   class="btn btn-success">Просмотр</a>

                <button type="button" class="btn delete btn-danger" onclick="let result = confirm('Вы уверены?');if (result) $(this).siblings('form').submit()">
                    Удалить
                </button>
                <form method="POST" action="{{ route('admin.cutaway.contacts.destroy', $item->id) }}">
                    @method('DELETE')
                    @csrf
                </form>
            </div>
        </div>
    </div>

    @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session()->get('success') }}
            </div>
        </div>
    @endif
@endsection
