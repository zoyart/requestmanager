@extends('layouts.layout')

@section('head-title')
    Карточка заявки
@endsection

@section('content')

@section('page.name')
    Редактирование данных аккаунта "{{ $data->name }}"
@endsection

<div class="cards back-light min-vh-100">
    <div class="container">
        <div class="row py-4">
            <div class="col">
                <form action="{{ route('account.update', ['account' => $data->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="general-info back-white rounded-3 shadow-sm p-4">
                        <div class="row pb-3">
                            <div class="col">
                                <div class="fsize-20 font-500">Основная информация</div>
                            </div>
                        </div>
                        <div class="font-text">
                            <div class="row pb-3 d-flex align-items-center">
                                <div class="">Имя:</div>
                                <div class="">
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ $data->name }}">
                                </div>
                            </div>
                            <div class="row pb-3 d-flex align-items-center">
                                <div class="">Фамилия:</div>
                                <div class="">
                                    <input type="text" class="form-control" id="surname" name="surname"
                                           value="{{ $data->surname }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg">
                            <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d">Обновить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
