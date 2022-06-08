<!doctype html>
<html lang="en">

@include('layouts.head')

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
