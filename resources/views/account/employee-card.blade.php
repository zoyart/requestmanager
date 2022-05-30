@extends('layouts.layout')

@section('head-title')
    Карточка сотрудника
@endsection

@section('content')
    <div class="page__name py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title font-500 fsize-20">
                        Карточка сотрудника
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card__buttons pb-4">
        <div class="container">
            <div class="d-flex">
                <form action="{{ route('employees.destroy', ['company_id' => $company_id, 'employee' => $data[0]['id']]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="button-circle-sm rounded-circle border-0 y-to-d me-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </div>
                    </button>
                </form>
                <form action="{{ route('employees.edit', ['company_id' => $company_id, 'employee' => $data[0]['id']]) }}" method="get">
                    <button type="submit" class="button-circle-sm rounded-circle border-0 y-to-d me-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd"
                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </div>
                    </button>
                </form>
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
                                <div class="col-3">Имя:</div>
                                <div class="col-9">{{ $data[0]['name'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-3">Фамилия:</div>
                                <div class="col-9">{{ $data[0]['surname'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-3">Email:</div>
                                <div class="col-9">{{ $data[0]['email'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-3">Должность:</div>
                                <div class="col-9">{{ $data[0]['position'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-3">Пароль:</div>
                                <div class="col-9">???</div>
                                <a class="" href="">Сменить пароль</a>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-3">Дата создания аккаунта:</div>
                                <div class="col-9">{{ $data[0]['created_at'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-3">Дата последнего изменения аккаунта:</div>
                                <div class="col-9">{{ $data[0]['updated_at'] }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
