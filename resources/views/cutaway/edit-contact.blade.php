@extends('layouts.app')
@section('content')
    @php
        /**
        * @var \App\Models\Contact $contact
        * @var \App\Models\Profile $profile
        */

    @endphp
    <div class="card">
        <div class="d-flex justify-content-between m-3">
            <a onclick="let result = confirm('Вы уверены?');if (result) $(this).siblings('form').submit()" title="Удалить">
                <svg style="height: 35px" aria-hidden="true" focusable="false" data-prefix="fa-light" data-icon="trash-can" class="svg-inline--fa fa-trash-can fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M432 64h-96l-33.63-44.75C293.4 7.125 279.1 0 264 0h-80C168.9 0 154.6 7.125 145.6 19.25L112 64h-96C7.201 64 0 71.2 0 80c0 8.799 7.201 16 16 16h416c8.801 0 16-7.201 16-16C448 71.2 440.8 64 432 64zM152 64l19.25-25.62C174.3 34.38 179 32 184 32h80c5 0 9.75 2.375 12.75 6.375L296 64H152zM400 128C391.2 128 384 135.2 384 144v288c0 26.47-21.53 48-48 48h-224C85.53 480 64 458.5 64 432v-288C64 135.2 56.84 128 48 128S32 135.2 32 144v288C32 476.1 67.89 512 112 512h224c44.11 0 80-35.89 80-80v-288C416 135.2 408.8 128 400 128zM144 416V192c0-8.844-7.156-16-16-16S112 183.2 112 192v224c0 8.844 7.156 16 16 16S144 424.8 144 416zM240 416V192c0-8.844-7.156-16-16-16S208 183.2 208 192v224c0 8.844 7.156 16 16 16S240 424.8 240 416zM336 416V192c0-8.844-7.156-16-16-16S304 183.2 304 192v224c0 8.844 7.156 16 16 16S336 424.8 336 416z" fill="currentColor"/></svg>            </a>
            <form hidden method="POST"
                  action="{{ route('edit.delete-contact', [$contact->profile_id, $contact->slug])}}">
                @method('DELETE')
                @csrf
            </form>
            <a onclick="$('#edit-contact').submit()" type="submit" >
                <svg style="wight: 35px; height: 35px" aria-hidden="true" focusable="false" data-prefix="fa-light" data-icon="square-check"  role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M384 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96C448 60.65 419.3 32 384 32zM416 416c0 17.64-14.36 32-32 32H64c-17.64 0-32-14.36-32-32V96c0-17.64 14.36-32 32-32h320c17.64 0 32 14.36 32 32V416zM308.7 180.7L192 297.4L139.3 244.7c-6.25-6.25-16.38-6.25-22.62 0s-6.25 16.38 0 22.62l64 64C183.8 334.4 187.9 336 192 336s8.188-1.562 11.31-4.688l128-128c6.25-6.25 6.25-16.38 0-22.62S314.9 174.4 308.7 180.7z" fill="currentColor"/></svg>
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="card-logo-contact">
                <img class="m-1" src="/{{ $contactOrigin->logo }}" width="80" height="80" alt="">
            </div>
        </div>
        <div class="card-body mt-5">
            <form id="edit-contact" method="POST"

                  action="{{ route('edit.edit-contact', [$contact->profile_id, $contact->slug]) }}"
                  enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <div class="d-flex justify-content-start">
                        <label for="link" class="form-label">{{ $contactOrigin->main_text }}</label>
                    </div>
                    <input id="link" type="text" class="form-control @error('link') is-invalid @enderror"
                           name="link" value="{{ $contact->link }}" placeholder="{{ $contactOrigin->example }}"
                           autocomplete="link">
                    @error('link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div id="app">
                        <div class="d-flex justify-content-between">
                            <label for="color" class="form-label">Цвет кнопки</label>
                        </div>
                        <color-piker nameinput='color' data="{{ $contact->color }}"> </color-piker>
                        <div class="d-flex justify-content-between">
                            <label for="color" class="form-label">Фоновый цвет кнопки</label>
                        </div>
                        <color-piker nameinput='background_color'  data="{{ $contact->background_color }}"> </color-piker>
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="text" class="form-label">Своё название кнопки (опционально)</label>
                    </div>
                    <input id="text" type="text" class="form-control @error('text') is-invalid @enderror"
                           name="text" value="{{ $contact->text }}" autocomplete="text">
                    @error('text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </form>
        </div>
    </div>
@endsection

