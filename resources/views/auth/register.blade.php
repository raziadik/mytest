@extends('layouts.app')

@section('content')
    <div class="text-center m-5">
        <img src="{{asset("/logo/logo5.png")}}" width="275" height="75">
    </div>
    <div class="card">
        <div class="m-4">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="m-4">
                    <div class="form-group">
                        <label for="username" class="form-label">Логин</label>
                        <input id="username" type="text"
                               class="form-control @error('username') is-invalid @enderror"
                               name="username" value="{{ old('username') }}" required autocomplete="username">
                        <input type="hidden" name="hash" value="{{ $hash }}">
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">E-mail</label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Пароль</label>
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
                        <label for="password-confirm" class="form-label">Подтвердить пароль</label>
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation"
                               required autocomplete="new-password">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="w-75 add-button btn-lg btn-primary">
                        Регистрация
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
