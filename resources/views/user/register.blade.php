<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset("resources/css/style.css") }}" />
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
    <div class="content d-flex vh-100">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <div class="start">
                <div class="container">
                    <div class="d-flex font-700 fsize-32 font-dark mb-5 justify-content-center">
                        <div class="">Регистрация</div>
                    </div>
                </div>
            </div>
            <form method="post" action="{{ route('register.store') }}" class="w-50">

                @csrf

                <div class="mb-3 form-group">
                    <label for="companyName" class="form-label">Название вашей компании</label>
                    <input type="text" class="form-control" id="companyName" name="companyName"
                           value="{{ old('companyName') }}">
                </div>
                <div class="mb-3 form-group">
                    <label for="name" class="form-label">Ваше имя</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{ old('name') }}">
                </div>
                <div class="mb-3 form-group">
                    <label for="surname" class="form-label">Ваша фамилия</label>
                    <input type="text" class="form-control" id="surname" name="surname"
                           value="{{ old('surname') }}">
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email адрес</label>
                    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="email"
                           value="{{ old('email') }}">
                    <div id="emailHelp" class="form-text">Мы никогда не будем делиться вашей электронной почтой с кем-либо.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Подтвердите пароль</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d">Зарегестрироваться</button>

            </form>
        </div>
    </div>
    <footer class="py-5 back-dark font-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="fsize-20 font-500 pb-3">Links</div>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <div class="d-flex">
                                <a href="#" class="nav-link p-0 me-3">
                                    <div class="link-circle-sm s2-to-y d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z" />
                                        </svg>
                                    </div>
                                </a>
                                <a href="#" class="nav-link p-0 me-3">
                                    <div class="link-circle-sm s2-to-y d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-discord" viewBox="0 0 16 16">
                                            <path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z" />
                                        </svg>
                                    </div>
                                </a>
                                <a href="#" class="nav-link p-0 me-3">
                                    <div class="link-circle-sm s2-to-y d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col">
                    <div class="fsize-20 font-500 pb-3">Section</div>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 link-on-dark">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 link-on-dark">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 link-on-dark">Pricing</a></li>
                    </ul>
                </div>

                <div class="col">
                    <div class="fsize-20 font-500 pb-3">Section</div>

                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 link-on-dark">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 link-on-dark">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 link-on-dark">Pricing</a></li>
                    </ul>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-4 mt-4 border-top">
                <p>© 2021 Company, Inc. All rights reserved.</p>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
