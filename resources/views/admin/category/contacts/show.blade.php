@extends('layouts.admin')
@section('content')

    @php
        /**
        * @var \App\Models\Contact $item
        */

    @endphp

    <div class="container col-sm-12 col-md-12 col-lg-10 col-xl-8">
        <div class="d-grid mb-2">
            <a href="{{ route('admin.cutaway.contacts.create') }}" class="btn btn-primary">Добавить кнопку</a>
        </div>

        <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-5"><strong>#</strong></div>
                    <div class="col-7">
                        {{ $item->id }}
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-5" style="padding-top: 10px; padding-bottom: 10px"><strong>Лого:</strong></div>
                    <div class="col-7 contact-logo">
                        <img class="contact-logo-img" src="/{{ $item->logo }}"
                             style="height: 50px; background-color: #d6d8db" alt="logo">
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-5"><strong>Название:</strong></div>
                    <div class="col-7">
                        {{ $item->title }}
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-5" style="padding-top: 10px; padding-bottom: 10px"><strong>Цвет фона:</strong></div>
                    <div class="col-7">
                        <div class="contact-color"
                             style="height: 40px; border:1px solid #000;background-color: {{ $item->background_color }}"></div>
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-5" style="padding-top: 10px; padding-bottom: 10px"><strong>Цвет текста:</strong>
                    </div>
                    <div class="col-7">
                        <div class="contact-color"
                             style="height: 40px; border:1px solid #000;background-color: {{ $item->color }}"></div>
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-5"><strong>Ссылка:</strong></div>
                    <div class="col-7">
                        {{ $item->main_link }}
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-5" style="padding-top: 10px; padding-bottom: 10px"><strong>Текст:</strong></div>
                    <div class="col-7">
                        {{ $item->main_text }}
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-5"><strong>Пример ввода:</strong></div>
                    <div class="col-7">
                        {{ $item->example }}
                    </div>
                </div>
            </li>
        </ul>

        <div class="d-grid text-center mt-2">
            <a href="{{ route('admin.cutaway.contacts.edit', $item->id) }}"
               class="btn btn-warning">Изменить</a>
            <button type="button" class="btn delete btn-danger"
                    onclick="let result = confirm('Вы уверены?');if (result) $(this).siblings('form').submit()">
                Удалить
            </button>
            <form method="POST" action="{{ route('admin.cutaway.contacts.destroy', $item->id) }}">
                @method('DELETE')
                @csrf
            </form>
        </div>
    </div>
@endsection
