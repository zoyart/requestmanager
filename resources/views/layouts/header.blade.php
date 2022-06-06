<nav class="navbar navbar-expand-lg back-dark py-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand me-5" href="{{ route('requests.index', \Illuminate\Support\Facades\Auth::user()->company_id) }}">
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
                <li class="nav-item me-2">
                    <a class="nav-link link-on-dark" href="{{ route('requests.create', \Illuminate\Support\Facades\Auth::user()->company_id) }}">Создать заявку</a>
                </li>
                <div class="dropdown nav-item me-2">
                    <a class="nav-link link-on-dark" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Компания
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item"
                               href="{{ route('clients.index', ['company_id' => \Illuminate\Support\Facades\Auth::user()->company_id]) }}">Клиенты</a></li>
                        <li><a class="dropdown-item"
                               href="{{ route('price-list.index', \Illuminate\Support\Facades\Auth::user()->company_id) }}">Прайс листы</a></li>
                        <li><a class="dropdown-item"
                               href="#">Оборудование</a></li>
                        <li><a class="dropdown-item"
                               href="">Склад</a></li>

                    </ul>
                </div>
                <li class="nav-item me-2">
                    <a class="nav-link link-on-dark"
                       href="{{ route('account.show', ['account' => \Illuminate\Support\Facades\Auth::user()->id, 'company_id' => \Illuminate\Support\Facades\Auth::user()->company_id]) }}">Аккаунт</a>
                </li>


                <!-- <li class="nav-item">
                    <a class="nav-link header-link" href="#">Сотрудники</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link header-link" href="#">Документация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link header-link" href="#">Оборудование</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link header-link" href="#">Склад</a>
                </li> -->
            </ul>
            <div class="mx-5">
                <label class="font-light font-500" for="">
                    {{ \Illuminate\Support\Facades\Auth::user()['name'] }} {{ \Illuminate\Support\Facades\Auth::user()['surname'] }}
                </label>
            </div>
            @if(\Illuminate\Support\Facades\Auth::check())
            <form action=" {{ route('logout') }} " method="get">
                @csrf
                <button type="submit" class="button border-0 rounded-pill l-to-y">Выйти</button>
            </form>
            @else
            <form method="get" action=" {{ route('login.form') }} ">
                @csrf
                <button type="submit" class="button border-0 rounded-pill l-to-y">Войти</button>
            </form>
            @endif
        </div>
    </div>
</nav>
