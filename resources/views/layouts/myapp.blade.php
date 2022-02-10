<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name=description content="ADDME best of business smart NFC card.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
{{--    <link rel="preload" as="font" type="font/woff2" href="/fonts/nunito-v16-latin_cyrillic-300.woff" crossorigin>--}}
    <link href="{{ asset('css/my.css') }}" rel="stylesheet">

    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WZ2XMMK');</script>
    <!-- End Google Tag Manager -->
</head>
<body class="client">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WZ2XMMK"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<main class="text-center">
    <div class="mt-3 mb-4">

        @yield('content')

        <div class="text-center mt-4">
            @auth
                @if (Auth::user()->isAdmin)
                    <div class="mb-2">
                        <a type="button" class="btn  btn-secondary" style="border-radius: 25px; width: 200px"
                           href="{{ route('admin.dashboard') }}">Админ панель</a>
                    </div>
                @endif
                <div class="mt-2">
                    <button type="button" class="btn btn-lg btn-outline-danger"
                            style="border-radius: 25px; border: 1px solid crimson"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Выйти
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </button>
                </div>
            @endauth
        </div>
    </div>
</main>

<footer>
    <div class="text-muted text-center mb-3">
        © 2020–2021 <br>
        v2.0.0
    </div>
</footer>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
