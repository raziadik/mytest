@extends('layouts.app')

@section('content')
    <div class="text-center m-5">
        <img src="{{asset("/logo/logo5.png")}}" width="275" height="75">
    </div>
    <div class="card">
        <div class="m-4">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                               autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Введите новый пароль</label>
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror" name="password" required
                           autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="form-label">Подтвердите пароль</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required autocomplete="new-password">
                </div>

                <div class="mt-4">
                    <button type="submit" class="w-75 add-button btn-lg btn-primary">
                        Сбросить пароль
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
