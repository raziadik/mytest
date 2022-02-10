@extends('layouts.app')

@section('content')
    <div class="text-center m-5">
        <img src="{{ asset("/logo/logo5.png") }}" width="275" height="75">
    </div>
    <div class="card">
        <div class="m-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="m-4">
                    <div class="form-group">
                        <label for="email" class="form-label">Логин</label>
                        <input id="username" type="text"
                               class="form-control @error('username') is-invalid @enderror"
                               name="username" value="{{ old('username') }}" required autocomplete="username"
                               autofocus>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Пароль</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="w-75 add-button btn-lg btn-primary">
                        Войти
                    </button>
                </div>

                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Запомнить меня
                    </label>
                </div>

                <div class="mt-3">
                    @if (Route::has('password.request'))
                        <a class="btn-link" href="{{ route('password.request') }}">
                            Забыли пароль?
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
