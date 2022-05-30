<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('head-title')
    </title>
    <link rel="shortcut icon" href="{{ asset('resources/icons/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset("resources/css/bootstrap.min.css") }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    @yield('links')
    <link rel="stylesheet" href="{{ asset("resources/css/style.css") }}">
</head>

<body>
    <div class="wrapper">

        @include('layouts.header')

        <main class="content">
            @yield('content')
        </main>

        @include('layouts.footer')

    </div>
</body>



<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>
<script type="text/javascript" src="{{ asset("resources/js/script.js") }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
@yield('scripts')


</html>
