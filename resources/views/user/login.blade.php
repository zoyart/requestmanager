<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="shortcut icon" href="{{ asset('resources/icons/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset("resources/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("resources/css/style.css") }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700;900&display=swap"
          rel="stylesheet">
</head>

<body>
<div class="wrapper">
<nav class="navbar navbar-expand-lg back-dark py-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand me-5" href="/">
                <div class="d-flex align-items-center fs-6">
                    <div class="me-2">
                        <img style="height: 40px;" src="{{ asset("resources/icons/logo.png") }}" alt="">
                    </div>
                    <div class="d-flex flex-column font-white justify-content-center font-900">
                        <div>
                            REQUEST
                        </div>
                        <div>
                            MANAGER
                        </div>
                    </div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item me-2">
                        <a class="nav-link link-on-dark" href="{{ route('requests.index', \Illuminate\Support\Facades\Auth::user()->company_id) }}">Мои заявки</a>
                    </li>
                    @endif
                    <li class="nav-item me-2">
                        <a class="nav-link link-on-dark" href="#">Контакты</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link link-on-dark" href="#">Документация</a>
                    </li>
                </ul>
                @if(\Illuminate\Support\Facades\Auth::check())
                <div class="mx-">
                    <label class="" for="">
                        {{ \Illuminate\Support\Facades\Auth::user()['name'] }} | CompanyName
                    </label>
                </div>
                @endif
                @if(\Illuminate\Support\Facades\Auth::check())
                <form method="get" action=" {{ route('logout') }} " class="d-flex">
                    <button class="button border-0 rounded-pill l-to-y" type="submit">Выйти</button>
                </form>
                @else
                <form method="get" action=" {{ route('login.form') }} " class="d-flex">
                    <button class="button border-0 rounded-pill l-to-y" type="submit">Войти</button>
                </form>
                @endif
            </div>
        </div>
    </nav>
    <div class="content d-flex justify-content-center align-items-center min-vh-100">
        <div class="container  d-flex flex-column justify-content-center align-items-center">
            <div class="start">
                <div class="container">
                    <div class="d-flex font-700 fsize-32 mb-5 justify-content-center">
                        <div class="">Войти</div>
                    </div>
                </div>
            </div>
            <form method="post" action=" {{ route('auth') }} " class="w-50">

                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email адрес</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           id="email"
                           aria-describedby="emailHelp"  placeholder="@error('email') {{ $message }} @enderror">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           id="password"  placeholder="@error('password') {{ $message }} @enderror">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d">Войти</button>

            </form>
        </div>
    </div>
    <footer class="py-5 back-dark font-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="fsize-20 font-500 pb-3">Ссылки на социальные сети</div>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <div class="d-flex">
                                <a href="#" class="nav-link p-0 me-3">
                                    <div
                                        class="link-circle-sm l-to-y-icon d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                             class="bi bi-telegram" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
                                        </svg>
                                    </div>
                                </a>
                                <a href="#" class="nav-link p-0 me-3">
                                    <div
                                        class="link-circle-sm l-to-y-icon  d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                             class="bi bi-discord" viewBox="0 0 16 16">
                                            <path
                                                d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z"/>
                                        </svg>
                                    </div>
                                </a>
                                <a href="#" class="nav-link p-0 me-3">
                                    <div
                                        class="link-circle-sm l-to-y-icon  d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                            <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                                        </svg>
                                    </div>
                                </a>
                                <a href="#" class="nav-link p-0 me-3">
                                    <div
                                        class="link-circle-sm l-to-y-icon  d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-between pt-4 mt-4 border-top">
                    <p>© 2022 Company, Inc. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
