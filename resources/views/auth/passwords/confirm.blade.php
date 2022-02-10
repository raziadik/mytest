@extends('layouts.app')

@section('content')
    <div class="text-center m-5">
        <img src="{{asset("/logo/logo5.png")}}" width="275" height="75">
    </div>
    <div class="card">
        <div class="m-4">
            {{ __('Please confirm your password before continuing.') }}

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror" name="password" required
                           autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="w-75 add-button btn-lg btn-primary">
                        Подтвердить пароль
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn-link" href="{{ route('password.request') }}">
                            Забыл пароль?
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
