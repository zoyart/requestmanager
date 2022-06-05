@extends('layouts.layout')

@section('head-title')
    Создание карточки клиента
@endsection

@section('content')
    <div class="page__name py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title font-500 fsize-20">
                        Создание карточки клиента
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="request-form py-4">
        <div class="container">
            <form method="post" action="{{ route('clients.store', ['company_id' => $company_id]) }}">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="title mb-3">
                            <label for="name" class="form-label">Название</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" placeholder="@error('name') {{ $message }} @enderror">
                        </div>
                        <div class="address mb-3">
                            <label for="address" class="form-label">Адрес</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                   id="address" name="address" placeholder="@error('address') {{ $message }} @enderror">
                        </div>
                        <div class="phone_number mb-3">
                            <label for="phone_number" class="form-label">Номер телефона</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                   id="phone_number" name="phone_number" placeholder="@error('phone_number') {{ $message }} @enderror">
                        </div>
                        <div class="email mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" placeholder="@error('email') {{ $message }} @enderror">
                        </div>
                        <div class="working_conditions mb-3">
                            <label for="working_conditions" class="form-label">Условия работы с заказчиком</label>
                            <textarea class="form-control" id="description" rows="10" name="working_conditions"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="latitude mb-3">
                            <label for="latitude" class="form-label">Широта</label>
                            <a href="#" data-bs-toggle="tooltip" title="Если вы хотите видеть клиента на карте, то необходимо указать его координаты.">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                </svg>
                            </a>
                            <input type="text" class="form-control" id="latitude" name="latitude">
                        </div>
                        <div class="longitude mb-3">
                            <label for="longitude" class="form-label">Долгота</label>
                            <a href="#" data-bs-toggle="tooltip" title="Если вы хотите видеть клиента на карте, то необходимо указать его координаты.">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                </svg>
                            </a>
                            <input type="text" class="form-control" id="longitude" name="longitude">
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-lg">
                        <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d">Создать</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
