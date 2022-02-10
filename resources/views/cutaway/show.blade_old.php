@extends('layouts.app')
@section('content')

    @php
        /**
        * @var \App\Models\User $user
        */

    @endphp
    <div class="card min-vh-25">
        <div class="d-flex justify-content-between m-3">
            @if(Auth::check() && $canEdit)
                <a href="{{ route('edit', $user->profile->id) }}" title="Профиль">
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"--}}
{{--                         class="bi bi-arrow-left-circle" viewBox="0 0 16 16">--}}
{{--                        <path fill-rule="evenodd"--}}
{{--                              d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>--}}
{{--                    </svg>--}}
                    <!-- <svg style="height: 35px" aria-hidden="true" focusable="false" data-prefix="fa-light" data-icon="square-arrow-left" class="svg-inline--fa fa-square-arrow-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M336 240H150.6l68.69-68.69c6.25-6.25 6.25-16.38 0-22.62s-16.38-6.25-22.62 0l-96 96C97.56 247.8 96 251.9 96 256s1.562 8.184 4.688 11.31l96 96c6.25 6.25 16.38 6.25 22.62 0s6.25-16.38 0-22.62L150.6 272H336c8.844 0 16-7.154 16-15.1C352 247.2 344.8 240 336 240zM384 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96C448 60.65 419.3 32 384 32zM416 416c0 17.64-14.36 32-32 32H64c-17.64 0-32-14.36-32-32V96c0-17.64 14.36-32 32-32h320c17.64 0 32 14.36 32 32V416z" fill="currentColor"/></svg> -->
                    <svg style="width: 35px" aria-hidden="true" focusable="false" data-prefix="fa-light" data-icon="sliders" class="svg-inline--fa fa-sliders fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M16 112h121.9C145.2 144 173.8 168 208 168s62.78-23.96 70.07-56H496C504.8 112 512 104.8 512 96c0-8.799-7.201-16-16-16h-217.9C270.8 47.96 242.2 24 208 24S145.2 47.96 137.9 80H16C7.201 80 0 87.2 0 96C0 104.8 7.201 112 16 112zM208 56c22.06 0 40 17.94 40 40S230.1 136 208 136S168 118.1 168 96S185.9 56 208 56zM496 240h-89.93C398.8 207.1 370.2 184 336 184s-62.78 23.96-70.07 56H16C7.201 240 0 247.2 0 256c0 8.799 7.201 16 16 16h249.9C273.2 304 301.8 328 336 328s62.78-23.96 70.07-56H496C504.8 272 512 264.8 512 256C512 247.2 504.8 240 496 240zM336 296c-22.06 0-40-17.94-40-40s17.94-40 40-40S376 233.9 376 256S358.1 296 336 296zM496 400H246.1C238.8 367.1 210.2 344 176 344s-62.78 23.96-70.07 56H16C7.201 400 0 407.2 0 416c0 8.799 7.201 16 16 16h89.93C113.2 464 141.8 488 176 488s62.78-23.96 70.07-56H496c8.799 0 16-7.199 16-16C512 407.2 504.8 400 496 400zM176 456c-22.06 0-40-17.94-40-40s17.94-40 40-40S216 393.9 216 416S198.1 456 176 456z" fill="currentColor"/></svg>

                </a>
                <a href=#>
                    <img src="{{asset("/logo/logo3.png")}}" width="110" height="30">
                </a>
                <a href="{{ route('qr') }}" title="QR-code">
{{--                    <img src="{{asset("/logo/qr1.png")}}" width="35" height="35">--}}
                    <svg style="height: 35px" aria-hidden="true" focusable="false" data-prefix="fa-light" data-icon="qrcode" class="svg-inline--fa fa-qrcode fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M108 360h-24c-6.627 0-12 5.373-12 12v24c0 6.627 5.373 12 12 12h24c6.627 0 12-5.373 12-12v-24C120 365.4 114.6 360 108 360zM108 104h-24c-6.627 0-12 5.373-12 12v24c0 6.627 5.373 12 12 12h24c6.627 0 12-5.373 12-12v-24C120 109.4 114.6 104 108 104zM144 288h-96C21.49 288 0 309.5 0 336v96C0 458.5 21.49 480 48 480h96C170.5 480 192 458.5 192 432v-96C192 309.5 170.5 288 144 288zM160 432C160 440.8 152.8 448 144 448h-96C39.16 448 32 440.8 32 432v-96C32 327.2 39.16 320 48 320h96C152.8 320 160 327.2 160 336V432zM144 32h-96C21.49 32 0 53.49 0 80v96C0 202.5 21.49 224 48 224h96C170.5 224 192 202.5 192 176v-96C192 53.49 170.5 32 144 32zM160 176C160 184.8 152.8 192 144 192h-96C39.16 192 32 184.8 32 176v-96C32 71.16 39.16 64 48 64h96C152.8 64 160 71.16 160 80V176zM364 104h-24c-6.627 0-12 5.373-12 12v24c0 6.627 5.373 12 12 12h24c6.627 0 12-5.373 12-12v-24C376 109.4 370.6 104 364 104zM400 32h-96C277.5 32 256 53.49 256 80v96C256 202.5 277.5 224 304 224h96C426.5 224 448 202.5 448 176v-96C448 53.49 426.5 32 400 32zM416 176C416 184.8 408.8 192 400 192h-96C295.2 192 288 184.8 288 176v-96C288 71.16 295.2 64 304 64h96C408.8 64 416 71.16 416 80V176zM432 288C423.2 288 416 295.2 416 304v64h-64v-64C352 295.2 344.8 288 336 288h-64C263.2 288 256 295.2 256 304v160c0 8.844 7.156 16 16 16s16-7.156 16-16V320h32v64c0 8.844 7.156 16 16 16h96c8.844 0 16-7.156 16-16V304C448 295.2 440.8 288 432 288zM436 432h-24c-6.627 0-12 5.373-12 12v24c0 6.627 5.373 12 12 12h24C442.6 480 448 474.6 448 468v-24C448 437.4 442.6 432 436 432zM372 432h-24c-6.627 0-12 5.373-12 12v24c0 6.627 5.373 12 12 12h24C378.6 480 384 474.6 384 468v-24C384 437.4 378.6 432 372 432z" fill="currentColor"/></svg>
                </a>
            @else
                <a href="{{ route('login') }}" title="Вход">
{{--                    <img src="{{asset("/logo/enter2.png")}}" width="40" height="40">--}}
                    <svg style="height: 35px" aria-hidden="true" focusable="false" data-prefix="fa-light" data-icon="right-to-bracket" class="svg-inline--fa fa-right-to-bracket fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M384 256c0-8.188-3.125-16.38-9.375-22.62l-128-128C237.5 96.22 223.7 93.47 211.8 98.44C199.8 103.4 192 115.1 192 128v64H48C21.49 192 0 213.5 0 240v32C0 298.5 21.49 320 48 320H192v64c0 12.94 7.797 24.62 19.75 29.56c11.97 4.969 25.72 2.219 34.88-6.938l128-128C380.9 272.4 384 264.2 384 256zM224 384V288H48C39.18 288 32 280.8 32 272v-32C32 231.2 39.18 224 48 224H224L223.1 128l128 128L224 384zM432 32h-96C327.2 32 320 39.16 320 48S327.2 64 336 64h96C458.5 64 480 85.53 480 112v288c0 26.47-21.53 48-48 48h-96c-8.844 0-16 7.156-16 16s7.156 16 16 16h96c44.13 0 80-35.88 80-80v-288C512 67.88 476.1 32 432 32z" fill="currentColor"/></svg>
                </a>
                <a href=#>
                    <img src="{{asset("/logo/logo3.png")}}" width="110" height="30">
                </a>
                <a href="{{ route('qr') }}" title="QR-code">
{{--                    <img src="{{asset("/logo/qr1.png")}}" width="35" height="35">--}}
                    <svg style="height: 35px" aria-hidden="true" focusable="false" data-prefix="fa-light" data-icon="qrcode" class="svg-inline--fa fa-qrcode fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M108 360h-24c-6.627 0-12 5.373-12 12v24c0 6.627 5.373 12 12 12h24c6.627 0 12-5.373 12-12v-24C120 365.4 114.6 360 108 360zM108 104h-24c-6.627 0-12 5.373-12 12v24c0 6.627 5.373 12 12 12h24c6.627 0 12-5.373 12-12v-24C120 109.4 114.6 104 108 104zM144 288h-96C21.49 288 0 309.5 0 336v96C0 458.5 21.49 480 48 480h96C170.5 480 192 458.5 192 432v-96C192 309.5 170.5 288 144 288zM160 432C160 440.8 152.8 448 144 448h-96C39.16 448 32 440.8 32 432v-96C32 327.2 39.16 320 48 320h96C152.8 320 160 327.2 160 336V432zM144 32h-96C21.49 32 0 53.49 0 80v96C0 202.5 21.49 224 48 224h96C170.5 224 192 202.5 192 176v-96C192 53.49 170.5 32 144 32zM160 176C160 184.8 152.8 192 144 192h-96C39.16 192 32 184.8 32 176v-96C32 71.16 39.16 64 48 64h96C152.8 64 160 71.16 160 80V176zM364 104h-24c-6.627 0-12 5.373-12 12v24c0 6.627 5.373 12 12 12h24c6.627 0 12-5.373 12-12v-24C376 109.4 370.6 104 364 104zM400 32h-96C277.5 32 256 53.49 256 80v96C256 202.5 277.5 224 304 224h96C426.5 224 448 202.5 448 176v-96C448 53.49 426.5 32 400 32zM416 176C416 184.8 408.8 192 400 192h-96C295.2 192 288 184.8 288 176v-96C288 71.16 295.2 64 304 64h96C408.8 64 416 71.16 416 80V176zM432 288C423.2 288 416 295.2 416 304v64h-64v-64C352 295.2 344.8 288 336 288h-64C263.2 288 256 295.2 256 304v160c0 8.844 7.156 16 16 16s16-7.156 16-16V320h32v64c0 8.844 7.156 16 16 16h96c8.844 0 16-7.156 16-16V304C448 295.2 440.8 288 432 288zM436 432h-24c-6.627 0-12 5.373-12 12v24c0 6.627 5.373 12 12 12h24C442.6 480 448 474.6 448 468v-24C448 437.4 442.6 432 436 432zM372 432h-24c-6.627 0-12 5.373-12 12v24c0 6.627 5.373 12 12 12h24C378.6 480 384 474.6 384 468v-24C384 437.4 378.6 432 372 432z" fill="currentColor"/></svg>
                </a>
            @endif
        </div>
        <div class="card-body text-center">
            <div class="cutaway-avatar m-auto">
                <div>
                    @if ($user->profile->user_img)
                        <img src="{{ asset($user->profile->user_img) }}">
                    @else
                        <img src="{{ asset('user_img/no_img.png') }}">
                    @endif
                </div>
            </div>

            @if(Auth::check() && $canEdit)
                <div class="qr">
                    <a href="{{ route('qr') }}" class="qr1">
                        <img src="{{asset("/logo/qr1.png")}}" class="logo-up1" width="30" height="30">
                    </a>
                </div>
            @endif

            <div class="mt-4">
                <h4>{{ $user->profile->name }}</h4>
            </div>
            <div class="cutaway-info-description mb-4">
                <h6>{{ $user->profile->description }}</h6>
            </div>
            <contact-buttons :movable="false" :contacts="{{ $user->profile->contacts->toJson() }}"></contact-buttons>
        </div>
    </div>
@endsection
