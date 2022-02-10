@extends('layouts.admin')
@section('content')

    @php
        /**
        * @var \App\Models\User $item
        */
                $url = "my.addme.plus/" . $item->hash;
    @endphp
    <div class="container col-sm-12 col-md-12 col-lg-10 col-xl-8">
        <div class="d-grid mb-2">
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">Добавить нового пользователя</a>
        </div>

        <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6"><strong>Номер:</strong></div>
                    <div class="col-6">
                        {{ $item->id }}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">

                    <div class="col-12">
                        <div class="input-group">
                            <button class="btn btn-secondary" id="copyText">Копировать</button>
                            <input type="text" class="form-control" id="inputText" value="{{$url}}">
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6"><strong>Логин:</strong></div>
                    <div class="col-6">
                        {{ $item->username }}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-3"><strong>Email:</strong></div>
                    <div class="col-6">
                        {{ $item->email }}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6"><strong>Хэш:</strong></div>
                    <div class="col-6">
                        {{ $item->hash }}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6"><strong>Роль:</strong></div>
                    <div class="col-6">
                        {{ $roles[$item->role] }}
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6"><strong>Статус:</strong></div>
                    <div class="col-6">
                        {{ $statuses[$item->status] }}
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6"><strong>Тип носителя:</strong></div>
                    <div class="col-6">
                        @if($item->type ==0)
                            Не выбрано
                        @elseif($item->type ==1)
                            Карта
                        @elseif($item->type ==2)
                            Чип
                        @elseif($item->type ==3)
                            К+Ч
                        @endif
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6"><strong>Комментарий:</strong></div>
                    <div class="col-6">
                        {{$item->comment}}
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6"><strong>Дата создания:</strong></div>
                    <div class="col-6">
                        {{ $item->created_at }}
                    </div>
                </div>
            </li>
        </ul>

        <div class="d-grid text-center mt-2 ">
            <a href="{{ route('admin.users.edit', $item->id) }}" class="btn btn-warning">Изменить</a>
            <button type="button" class="btn delete btn-danger"
                    onclick="let result = confirm('Вы уверены?');if (result) $(this).siblings('form').submit()">
                Удалить
            </button>
            <form method="POST" action="{{ route('admin.users.destroy', $item->id) }}">
                @method('DELETE')
                @csrf
            </form>
        </div>
    </div>
    <script>
        /* сохраняем текстовое поле в переменную text */
        var text = document.getElementById("inputText");
        /* сохраняем кнопку в переменную btn */
        var btn = document.getElementById("copyText");
        /* вызываем функцию при нажатии на кнопку */
        btn.onclick = function() {
            text.select();
            document.execCommand("copy");
        }
    </script>
@endsection
