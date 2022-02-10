@extends('layouts.admin')
@section('content')
    @php
        /**
        * @var \App\Models\User $item
        */
                $url = URL::to('/') . '/' . $item->hash;
    @endphp
    <div class="container col-sm-12 col-md-12 col-lg-10 col-xl-8">
        <div class="d-grid">
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">Добавить нового пользователя</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.update', $item->id) }}">
                @csrf
                @method("PATCH")

                <div class="form-group row mt-2">
                    <label for="username" class="col-md-4 col-form-label text-md-right">Логин</label>
                    <div class="col-md-6">
                        <input id="username" type="text"
                               class="form-control @error('username') is-invalid @enderror" name="username"
                               value="{{ $item->username }}" autocomplete="username">

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-2">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ $item->email }}" autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="role" class="col-md-4 col-form-label text-md-right">Роль</label>
                    <div class="col-md-6">
                        <select name="role" id="role" class="form-control">
                            @foreach($roles as $id => $title)
                                <option value="{{ $id }}"
                                        @if($id == $item->role) selected @endif
                                >
                                    {{ $title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row mt-2">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Статус</label>
                    <div class="col-md-6">
                        <select name="status" id="status" class="form-control">
                            @foreach($statuses as $id => $title)
                                <option value="{{ $id }}"
                                        @if($id == $item->status) selected @endif
                                >
                                    {{ $title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row mt-2">
                    <label for="type" class="col-md-4 col-form-label text-md-right">Тип носителя</label>
                    <div class="col-md-6">
                        <select name="type" id="type" class="form-control custom-select">
                            <option value="0" @if($item->type==0) selected @endif>
                                -Выбрать-
                            </option>
                            <option value="1" @if($item->type==1) selected @endif>
                                Карта
                            </option>
                            <option value="2" @if($item->type==2) selected @endif>
                                Чип
                            </option>
                            <option value="3" @if($item->type==3) selected @endif>
                                К+Ч
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="type" class="col-md-4 col-form-label text-md-right">Комментарий</label>
                    <div class="col-md-6">
                        <textarea name="comment" id="comment" class="form-control">{{$item->comment}}</textarea>
                    </div>
                </div>

                <div class="d-grid text-center mt-2">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
            <div class="d-grid text-center">
            <a href="{{ route('admin.users.show', $item->id) }}" class="btn btn-success">Просмотр</a>
            <button type="button" class="btn delete btn-danger"
                    onclick="
                                            let result = confirm('Вы уверены?');if (result) $(this).siblings('form').submit()"
            >
                Удалить
            </button>
            <form method="POST" action="{{ route('admin.users.destroy', $item->id) }}">
                @method('DELETE')
                @csrf
            </form>
        </div>
        </div>
    

    @if(session('success'))
        <div class=" text-center">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close btn btn-secondary" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session()->get('success') }}
            </div>
        </div>
    @endif
</div>
@endsection
