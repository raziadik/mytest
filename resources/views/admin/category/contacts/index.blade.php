@extends('layouts.admin')

@section('content')


    <div class="d-grid mb-2">
        <a href="{{ route('admin.cutaway.contacts.create') }}" class="btn btn-primary">Добавить кнопку</a>
    </div>

    <div class="table-responsive">
        <table class="table table-light table-bordered table-sm">
            <thead>
            <tr class="table-primary text-center align-middle">
                <th>#</th>
                <th>Имя</th>
                <th>Логотип</th>
            </tr>
            </thead>
            <tbody>
            @foreach($paginator as $item)
                @php /** @var \App\Models\Contact[] $item */ @endphp
                <tr>
                    <td class="text-center align-middle">{{ $item->id }}</td>
                    <td class="text-center align-middle">{{ $item->sort }}</td>
                    <td class="text-center align-middle">
                        <img class="contact-logo-img" src="/{{ $item->logo }}"
                             style="height: 35px; width: 35px; background-color: #d6d8db" alt="logo">
                    </td>
                    <td class="align-middle" style="min-width: 150px">{{ $item->title }}</td>
                    <td class="align-middle">
                        <div class="contact-color"
                             style="height: 35px; min-width: 50px; border:1px solid #000; background-color: {{ $item->background_color }}"></div>
                    </td>
                    <td class="align-middle">
                        <div class="contact-color"
                             style="height: 35px; min-width: 50px; border:1px solid #000; background-color: {{ $item->color }}"></div>
                    </td>
                    <td class="text-center align-middle table-primary">
                        <div class="btn-group">
                            <a class="btn" href="{{ route('admin.cutaway.contacts.show', $item->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </a>

                            <a href="{{route('admin.cutaway.contacts.edit', $item->id)}}" class="btn"
                               title="Редактировать">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </a>

                            <button type="button" class="btn"
                                    onclick="let result = confirm('Вы уверены?');if (result) $(this).siblings('form').submit()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd"
                                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>
                            <form method="POST" action="{{ route('admin.cutaway.contacts.destroy', $item->id) }}">
                                @method('DELETE')
                                @csrf
                            </form>
                        </div>
                    </td>
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

    <ul class="pagination">
        @if($paginator->total() > $paginator->count())
            {{ $paginator->links() }}
        @endif
    </ul>
    </div>
@endsection
