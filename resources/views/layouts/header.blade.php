<nav class="navbar navbar-expand-lg back-dark navbar-dark py-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand me-5" href="{{ route('requests.index') }}">
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item me-2">
                    <a class="nav-link link-on-dark" href="{{ route('requests.create') }}">Создать заявку</a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::user()->user_status !== 'client')
                <div class="dropdown nav-item me-2">
                    <a class="nav-link link-on-dark" href="#" role="button" id="dropdownMenuLink"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Компания
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('clients.index') }}">Клиенты
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('price-list.index') }}">Прайс листы
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('inventory.index') }}">Склад
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
                <li class="nav-item me-2">
                    <a class="nav-link link-on-dark"
                       href="{{ route('account.show', ['account' => \Illuminate\Support\Facades\Auth::user()->id]) }}">Аккаунт</a>
                </li>

            </ul>
            <a class="font-light font-500 me-5" for=""
               href="{{ route('account.show', ['account' => \Illuminate\Support\Facades\Auth::user()->id]) }}">
                {{ \Illuminate\Support\Facades\Auth::user()['name'] }}
                {{ \Illuminate\Support\Facades\Auth::user()['surname'] }}
            </a>

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
