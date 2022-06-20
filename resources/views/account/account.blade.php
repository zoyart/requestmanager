@extends('layouts.layout')

@section('head-title')
    Карточка заявки
@endsection

@section('content')

    @section('page.name')
        Личный кабинет "{{ $data[0]['name'] }} {{ $data[0]['surname'] }}"
    @endsection

    <div class="container pb-2">
        <div class="col">
            <div class="d-flex" id="actions">
                <form action="{{ route('account.destroy', ['account' => $data[0]['id']]) }}" method="post">
                    @csrf
                    @method('delete')
                <button type="submit" data-bs-target="#create" data-bs-toggle="modal"
                        class="d-inline-block button-sm border-0 rounded-pill y-to-d me-3">
                    Удалить аккаунт
                </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card__menu pt-4">
        <div class="container">
            <div class="col">
                <div class="d-flex">
                    <a class="tab rounded-top back-light font-dark text-center font-500" href="">Аккаунт</a>
                    @if(auth()->user()->can('Просмотр всех сотрудников'))
                        <a class="tab rounded-top font-dark text-center font-500" href="{{ route('employees.index') }}">Сотрудники</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="cards back-light min-vh-100">
        <div class="container">
            <div class="row py-4">
                <div class="col">
                    <div class="general-info back-white rounded-3 shadow-sm p-4">
                        <div class="row pb-3">
                            <div class="col">
                                <div class="fsize-20 font-500">Основная информация</div>
                            </div>
                        </div>
                        <div class="font-text">
                            <div class="row  pb-3">
                                <div class="col-2">Имя:</div>
                                <div class="col-10">{{ $data[0]['name'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-2">Фамилия:</div>
                                <div class="col-10">{{ $data[0]['surname'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-2">Почта:</div>
                                <div class="col-10">{{ $data[0]['email'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-2">Пароль:</div>
                                <div class="col-10">???</div>
                                <a class="" href="">Сменить пароль</a>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-2">Дата регистрации:</div>
                                <div class="col-10">{{ $data[0]['created_at'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-2">Название компании:</div>
                                <div class="col-10">{{ $company_data[0]['name'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-2">Владелец:</div>
                                <div class="col-10">{{ ($data[0]['user_status'] === 'owner') ? 'Да' : 'Нет'  }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
