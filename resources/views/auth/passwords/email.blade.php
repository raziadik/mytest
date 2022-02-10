@extends('layouts.app')

@section('content')
    <div class="text-center m-5">
        <img src="{{asset("/logo/logo5.png")}}" width="275" height="75">
    </div>
    <div class="card">
        <div class="m-4">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">E-mail</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <div class="mt-4">
                    <button type="submit" class="w-75 add-button btn-lg btn-primary">
                        Cброс пароля
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
