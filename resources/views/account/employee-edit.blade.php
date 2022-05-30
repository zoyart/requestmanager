@extends('layouts.layout')

@section('head-title')
    Редактирование
@endsection

@section('content')
    <div class="page__name py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title font-500 fsize-20">
                        Изменение данных пользователя "{{ $data[0]['name'] }} {{ $data[0]['surname'] }}"
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cards back-light min-vh-100">
        <div class="container">
            <form action="{{ route('employees.update', ['company_id' => $company_id, 'employee' => $data[0]['id']])}}"
                  method="post">
                @csrf
                @method('PUT')
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
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="{{ $data[0]['name'] }}">
                                    </div>
                                </div>
                                <div class="row  pb-3">
                                    <div class="col-3">Фамилия:</div>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="surname" name="surname"
                                               value="{{ $data[0]['surname'] }}">
                                    </div>
                                </div>
{{--                                <div class="row  pb-3">--}}
{{--                                    <div class="col-3">Email:</div>--}}
{{--                                    <div class="col-9">--}}
{{--                                        <input type="text" class="form-control" id="email" name="email"--}}
{{--                                               value="{{ $data[0]['email'] }}">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="row  pb-3">
                                    <div class="col-3">Должность:</div>
                                    <div class="col-9">
                                        <select name="position" class="form-select">
                                            <option value="111111111" selected>Пока нечего писать</option>
                                            <option value="222222222">Исправить</option>
                                            <option value="333333333">Позже</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row  pb-3">
                                    <div class="col-3">Пароль:</div>
                                    <div class="col-9">???</div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-lg">
                                <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d">
                                    Обновить
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
