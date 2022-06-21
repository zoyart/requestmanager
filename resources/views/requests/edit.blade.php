@extends('layouts.layout')

@section('head-title')
    Редактирование заявки
@endsection

@section('content')

@section('page.name')
    Редактирование заявки "{{ $request['id'] }}"
@endsection

    <div class="cards back-light min-vh-100">
        <div class="container">
            <form action="{{ route('requests.update', ['request' => $request['id']])}}"
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
                                               value="{{ $request['title'] }}">
                                    </div>
                                </div>
                                <div class="description mb-3">
                                    <label for="description" class="form-label">Описание:</label>
                                    <textarea class="form-control" id="description" rows="16"
                                              name="description" value="">{{ $request['description'] }}
                                    </textarea>
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
                                    <div class="col-4">Тип заявки:</div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="request_type" name="request_type"
                                               value="{{ $request->request_type }}">
                                    </div>
                                </div>
                                <div class="row  pb-3 d-flex align-items-center">
                                    <div class="col-4">Статус:</div>
                                    <div class="col-8">
                                        <select name="status" class="form-select">
                                            <option value="{{ $request['status'] }}" selected>{{ $request['status'] }}</option>
                                            <option value="Новая">Новая</option>
                                            <option value="В работе">В работе</option>
                                            <option value="Завершена">Завершена</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row  pb-3 d-flex align-items-center">
                                    <div class="col-4">Срочность:</div>
                                    <div class="col-8">
                                        <select name="urgency" class="form-select">
                                            <option value="{{ $request['urgency'] }}" selected>{{ $request['urgency'] }}</option>
                                            <option value="В работе">Низкая</option>
                                            <option value="В работе">Средняя</option>
                                            <option value="Завершена">Высокая</option>
                                        </select>
                                    </div>
                                </div>
{{--                                <div class="user_id mb-3">--}}
{{--                                    <label for="user_id" class="form-label">Исполнитель</label>--}}
{{--                                    <select name="user_id"  class="form-select">--}}
{{--                                        <option value="{{auth()->user()->id}}" selected>Я</option>--}}
{{--                                        @foreach($employees as $employee)--}}
{{--                                            <option value="{{ $employee['id'] }}">{{ $employee['name'] }}--}}
{{--                                                {{ $employee['surname'] }} ({{ $employee['position'] }})--}}
{{--                                            </option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <div class="row  pb-3 d-flex align-items-center">
                                    <div class="col-4">Оплачено:</div>
                                    <div class="col-8">
                                        <select name="is_paid" class="form-select">
                                            <option value="{{ $request->is_paid }}" selected>{{ $request->is_paid }}</option>
                                            @if($request->is_paid === "Да")
                                                <option value="Нет">Нет</option>
                                            @else
                                                <option value="Да">Да</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row  pb-3 d-flex align-items-center">
                                    <div class="col-4">Адрес:</div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="object_address" name="object_address"
                                               value="{{ $request->object_address }}">
                                    </div>
                                </div>
                                <div class="row  pb-3 d-flex align-items-center">
                                    <div class="col-4">Инвентарный номер:</div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="inventory_number" name="inventory_number"
                                               value="{{ $request->inventory_number }}">
                                    </div>
                                </div>
                                <div class="row  pb-3 d-flex align-items-center">
                                    <div class="col-4">Серийный номер:</div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="serial_number" name="serial_number"
                                               value="{{ $request->serial_number }}">
                                    </div>
                                </div>
                                <div class="row  pb-3 d-flex align-items-center">
                                    <div class="col-4">Широта:</div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="latitude" name="latitude"
                                               value="{{ $request['latitude'] }}">
                                    </div>
                                </div>
                                <div class="row  pb-3 d-flex align-items-center">
                                    <div class="col-4">Долгота:</div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="longitude" name="longitude"
                                               value="{{ $request['longitude'] }}">
                                    </div>
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
        </div>
    </div>

@endsection
