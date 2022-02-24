@extends('layouts.admin')
@section('content')

    <div class="container">

        @if(session('success'))
            <div class="row mb-2 justify-content-center mb-3">
                <div class="col-md-8">
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session()->get('success') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="d-grid mb-2">
            <a href="{{ route('admin.cutaway.contacts.create') }}" class="btn btn-primary">Добавить кнопку</a>
        </div>

        <div class="row mb-2 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.cutaway.contacts.store') }}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row mb-2">
                                    <label for="logo" class="col-md-4 col-form-label text-md-right">Лого</label>
                                    <div class="col-md-6">
                                        <input id="logo" type="file"
                                               class="form-control @error('logo') is-invalid @enderror" name="logo">
                                        @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label for="title" class="col-md-4 col-form-label text-md-right">Название</label>
                                    <div class="col-md-6">
                                        <input id="title" type="text"
                                               class="form-control @error('title') is-invalid @enderror" name="title"
                                               value="{{ old('title') }}" autocomplete="title">

                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label for="background_color" class="col-md-4 col-form-label text-md-right">Цвет
                                        фона</label>
                                    <div class="col-md-6">
                                        <input id="background_color" style="height: 40px" type="color"
                                               class="form-control @error('background_color') is-invalid @enderror"
                                               name="background_color" value="#0B4EEA">
                                        @error('background_color')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label for="color" class="col-md-4 col-form-label text-md-right">Цвет теста</label>
                                    <div class="col-md-6">
                                        <input id="color" style="height: 40px" type="color"
                                               class="form-control @error('color') is-invalid @enderror" name="color"
                                               value="#FFFFFF">
                                        @error('color')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label for="main_link" class="col-md-4 col-form-label text-md-right">Ссылка</label>
                                    <div class="col-md-6">
                                        <input id="main_link" type="text" class="form-control @error('main_link') is-invalid @enderror" name="main_link" value="" autocomplete="main_link">

                                        @error('main_link')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label for="main_text" class="col-md-4 col-form-label text-md-right">Текст</label>
                                    <div class="col-md-6">
                                        <input id="main_text" type="text"
                                               class="form-control @error('main_text') is-invalid @enderror"
                                               name="main_text" value="" autocomplete="main_text">

                                        @error('main_text')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label for="example" class="col-md-4 col-form-label text-md-right">Пример ввода</label>
                                    <div class="col-md-6">
                                        <input id="example" type="text"
                                               class="form-control @error('example') is-invalid @enderror"
                                               name="example" value="" autocomplete="example">

                                        @error('example')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-2 mb-0">
                                    <div class="col-md-6 offset-md-4 d-grid">
                                        <button type="submit" class="btn btn-primary">Сохранить</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
