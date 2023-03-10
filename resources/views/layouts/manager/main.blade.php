<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{asset('icon-48x48.png')}}" />
    <title>{{config('app.name')}}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>
<div class="wrapper">
    @include('partials.sidebar')
        <div class="main">
            @include('partials.navbar')
            @yield('content')
            @include('partials.footer')
        </div>
</div>
</body>
</html>
