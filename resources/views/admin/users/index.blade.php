@extends('layouts.admin')

@section('content')

    <div class="d-grid mb-2">
        <a href="{{ route('admin.users.create') }}" class="btn btn-success">Добавить нового пользователя</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <thead>
            <tr class="table-primary text-center">
                <th>#</th>
                <th>Логин</th>
                <th>Email</th>
                <th>Хэш</th>
                <th>Статус</th>
                <th>Роль</th>
                <th>Носитель</th>
                <th>Метки</th>
                <th>Кнопки</th>
            </tr>
            </thead>
            <tbody>
            @foreach($paginator as $item)
                @php /** @var \App\Models\User[] $item */ @endphp
                <tr @if($item->status==0) style="background-color: #cccccc"
                    @elseif($item->status==1) style="background-color: #c7eed8"
                    @elseif($item->status==2) style="background-color: #f7d89b"
                    @endif>
                    <td class="text-center align-middle">{{ $item->id }}</td>
                    <td class="align-middle">{{ $item->username }}</td>
                    <td class="align-middle">{{ $item->email }}</td>
                    <td class="text-center align-middle">{{ $item->hash }}</td>

                    <form method="POST" action="{{ route('admin.users.update', $item->id) }}">
                        @csrf
                        @method("PATCH")

                        <td class="text-center align-middle">
                            {{-- <h3>{{ $statuses[$item->status] }}</h3> --}}
                            <select name="status" id="status" class="custom-select text-center">
                                <option value="0" @if($item->status==0) selected @endif>
                                    Неактив
                                </option>
                                <option value="1" @if($item->status==1) selected @endif>
                                    Активный
                                </option>
                                <option value="2" @if($item->status==2) selected @endif>
                                    Прошита
                                </option>
                            </select>
                        </td>
                        <td class="text-center align-middle">
                            <select name="role" id="role" class="custom-select text-center">
                                <option>
                                </option>
                                @foreach($roles as $key => $role)
                                    <option value="{{ $role->name }}" @if($role->id == $item->getRoleId()) selected @endif>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td class="text-center align-middle">
                            <select name="type" id="type" class="custom-select text-center">
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
                        </td>
                        <td class="align-middle">
                            <textarea name="comment" id="comment" class="form-control"
                                      style="min-width: 200px; height: 25px">{{$item->comment}}</textarea>
                        </td>
                        <td class="align-middle text-center btn-group">
                            <button type="submit" class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                         class="bi bi-check2-square" viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                                    </svg>
                                </button>
                    </form>

                    <a class="btn" href="{{ route('admin.users.show', $item->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-eye" viewBox="0 0 16 16">
                            <path
                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path
                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>
                    </a>

                    <a href="{{route('admin.users.edit', $item->id)}}" class="btn" title="Редактировать">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-pencil" viewBox="0 0 16 16">
                            <path
                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                    </a>

                    <a class="btn"
                       onclick="let result = confirm('Вы уверены?');if (result) $(this).siblings('form').submit()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-trash" viewBox="0 0 16 16">
                            <path
                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd"
                                  d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </a>
                    <form method="POST" action="{{ route('admin.users.destroy', $item->id) }}">
                        @method('DELETE')
                        @csrf
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @if(session('success'))
        <div class="text-center">
            <div class="alert-success" style="height: 20px" role="alert">
                {{ session()->get('success') }}
            </div>
        </div>
    @endif
    <form>
        <input class="form-control" type="search" name="q" value="{{$q}}" placeholder="ПОИСК..." style="height: 30px">
    </form>
    <ul class="pagination mt-3">
        @if($paginator->total() > $paginator->count())
            {{ $paginator->appends([ 'q'=>$q])->links() }}
        @endif
    </ul>
@endsection
