<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    @yield('header')

    @vite('resources/scss/main.scss')
</head>
<body >
<div class="uk-container uk-margin-medium-top">
    @yield('breadcrumb')
</div>

<div class="uk-container uk-margin-medium-top">
    @yield('content')
</div>

@vite('resources/js/app.js')
</body>
</html>
