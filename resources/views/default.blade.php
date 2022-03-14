<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dev test') }}</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    @stack('css')
</head>

<body class="app">

<div class="page-container">

    <main class='main-content bgc-grey-100'>
        <div id='mainContent'>
            <div class="container-fluid">

                <h4 class="c-grey-900 mT-10 mB-30">@yield('page-header')</h4>

                @yield('content')

            </div>
        </div>
    </main>

</div>

<script src="https://kit.fontawesome.com/c0a94fded1.js" crossorigin="anonymous"></script>
<script src="{{ mix('/js/app.js') }}"></script>
@stack('js')

</body>

</html>
