@extends('layouts.layout')

@section('head-title')
    Редактирование заявки
@endsection

@section('content')

@section('page.name')
    Редактирование заявки "{{ $data['id'] }}"
@endsection

    <div class="cards back-light min-vh-100">
        <div class="container">
            <form action="{{ route('requests.update', ['request' => $data['id']])}}"
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
                                <div class="row pb-3 d-flex align-items-center">
                                    <div class="col-2">Тема:</div>
                                    <div class="col-10">
                                        <input type="text" class="form-control" id="title" name="title"
                                               value="{{ $data['title'] }}">
                                    </div>
                                </div>
                                <div class="row pb-3 d-flex align-items-center">
                                    <div class="col-2">Описание:</div>
                                    <div class="col-10">
                                        <input type="text" class="form-control" id="description" name="description"
                                               value="{{ $data['description'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="additional-info back-white rounded-3 shadow-sm p-4">
                            <div class="row pb-3">
                                <div class="col">
                                    <div class="fsize-20 font-500">Дополнительная информация</div>
                                </div>
                            </div>
                            <div class="font-text">
                                <div class="row  pb-3 d-flex align-items-center">
                                    <div class="col-4">Контракт:</div>
                                    <div class="col-8">
                                        <select name="status" class="form-select">
                                            <option value="111111111" selected>Пока нечего писать</option>
                                            <option value="222222222">Исправить</option>
                                            <option value="333333333">Позже</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row  pb-3 d-flex align-items-center">
                                    <div class="col-4">Услуга:</div>
                                    <div class="col-8">
                                        <select name="status" class="form-select">
                                            <option value="111111111" selected>Услуги пока тоже не сделаны</option>
                                            <option value="222222222">Сделать</option>
                                            <option value="333333333">Позже</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row  pb-3 d-flex align-items-center">
                                    <div class="col-4">Тип заявки:</div>
                                    <div class="col-8">data</div>
                                </div>
                                <div class="row  pb-3 d-flex align-items-center">
                                    <div class="col-4">Статус:</div>
                                    <div class="col-8">
                                        <select name="status" class="form-select">
                                            <option value="{{ $data['status'] }}" selected>{{ $data['status'] }}</option>
                                            <option value="В работе">В работе</option>
                                            <option value="Завершена">Завершена</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row  pb-3 d-flex align-items-center">
                                    <div class="col-4">Ответственный:</div>
                                    <div class="col-8">data</div>
                                </div>
                                <div class="row  pb-3 d-flex align-items-center">
                                    <div class="col-4">Оплачено:</div>
                                    <div class="col-8">data</div>
                                </div>
                                <div class="row  pb-3 d-flex align-items-center">
                                    <div class="col-4">Номер заявки:</div>
                                    <div class="col-8">{{ $data['id'] }}</div>
                                </div>
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

            {{--        <div class="row pb-4">--}}
            {{--            <div class="col">--}}
            {{--                <div class="map back-white rounded-3 shadow-sm p-3">--}}
            {{--                    <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d500.8663690719773!2d55.3817390469361!3d57.71458766493508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43e619ef30008317%3A0xefce1851e3502ca5!2z0YPQuy4g0JPQsNCz0LDRgNC40L3QsCwgNjUsINCe0YXQsNC90YHQuiwg0J_QtdGA0LzRgdC60LjQuSDQutGA0LDQuSwgNjE4MTAw!5e1!3m2!1sru!2sru!4v1650815389149!5m2!1sru!2sru" width="600" height="450" style="border: 0; display: block" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">--}}
            {{--                    </iframe>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
        </div>
    </div>

@endsection
