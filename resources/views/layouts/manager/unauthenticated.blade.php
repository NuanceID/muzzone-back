<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{asset('icon-48x48.png')}}"/>
    <title>MuzZone</title>
    @vite('resources/css/app.scss')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<main class="d-flex w-100">
    @yield('content')
</main>
@vite('resources/js/app.js')
</body>
</html>
