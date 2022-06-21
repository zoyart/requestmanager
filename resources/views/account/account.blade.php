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
                <button type="submit" data-bs-target="#staticBackdrop" data-bs-toggle="modal"
                        class="d-inline-block button border-0 rounded-pill y-to-d me-3">
                    Удалить аккаунт
                </button>
                <!-- Modal create -->
                <form action=" {{ route('account.destroy', ['account' => $data[0]['id']]) }}"
                      method="post">
                    @csrf
                    @method('delete')
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Вы хотите удалить аккаунт?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d">
                                        Удалить
                                    </button>
                                    <button type="button" class="d-inline-block button-sm border-0 rounded-pill l-to-d"
                                            data-bs-dismiss="modal">Отмена
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- EndModal -->
                <form action="{{ route('account.edit', ['account'=> $data[0]['id']]) }}"
                      method="get">
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
                                <div class="col">Имя:</div>
                                <div class="col">{{ $data[0]['name'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col">Фамилия:</div>
                                <div class="col">{{ $data[0]['surname'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col">Почта:</div>
                                <div class="col">{{ $data[0]['email'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col">Пароль:</div>
                                <div class="col">???</div>
                                <a class="" href="">Сменить пароль</a>
                            </div>
                            <div class="row  pb-3">
                                <div class="col">Дата регистрации:</div>
                                <div class="col">{{ $data[0]['created_at'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col">Название компании:</div>
                                <div class="col">{{ $company_data[0]['name'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col">Владелец:</div>
                                <div class="col">{{ ($data[0]['user_status'] === 'owner') ? 'Да' : 'Нет'  }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
