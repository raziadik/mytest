@extends('layouts.app')
@section('content')

    @php
        /**
        * @var \App\Models\User $user
        */
    @endphp
        <div class="card">
            <div class="qr-header">
                <h2>QR Code</h2>
            </div>
            <div class="qr-body">
                {!! QrCode::size(320)->generate(URL::previous()); !!}
            </div>
        </div>
@endsection
