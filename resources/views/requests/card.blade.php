@extends('layouts.layout')

@section('head-title')
    Карточка заявки
@endsection

@section('content')

@section('page.name')
    Заявка "{{ $request['id'] }}"
@endsection

    <div class="card__buttons">
        <div class="container">
            <div class="d-flex">
                <form action="{{ route('requests.destroy', ['request' => $request['id']]) }}"
                      method="post">
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
                <form action="{{ route('requests.edit', ['request' => $request['id']]) }}"
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
                <button type="button" class="button border-0 rounded-pill y-to-d" data-bs-target="#change-status"
                        data-bs-toggle="modal">
                    Изменить статус
                </button>
                <form action="{{ route('requests.change-status', ['id' => $request['id']]) }}"
                      method="post">
                @csrf
                @method('PUT')
                <!-- Modal create -->
                    <div class="modal fade" id="change-status" data-bs-backdrop="static" data-bs-keyboard="false"
                         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Изменить статус заявки</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="name my-3">
                                        <label for="name" class="form-label">Текущий
                                            статус: {{ $request['status'] }}</label>
                                    </div>
                                    <div class="status mb-3">
                                        <label class="form-label">Укажите новый статус:</label>
                                        <select name="status" class="form-select">
                                            <option value="Новая">Новая</option>
                                            <option value="В работе" selected>В работе</option>
                                            <option value="Требуется ЗИП">Требуется ЗИП</option>
                                            <option value="Завершена">Завершена</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d">
                                        Изменить
                                    </button>
                                    <button type="button" class="d-inline-block button-sm border-0 rounded-pill l-to-d"
                                            data-bs-dismiss="modal">Отмена
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- EndModal -->
                </form>
            </div>
        </div>
    </div>
    <div class="card__menu pt-4">
        <div class="container">
            <div class="col">
                <div class="d-flex">
                    <a class="tab rounded-top back-light font-dark text-center font-500" href="">Карточка заявки</a>
                    <a class="tab rounded-top font-dark text-center font-500" href="{{ route('messages.index', ['id' => $request['id']]) }}">Согласования</a>
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
                                <div class="col">Тема:</div>
                                <div class="col">{{ $request->title }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col">Описание:</div>
                                <div class="col">{{ $request->description }}</div>
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
                            <div class="row  pb-3">
                                <div class="col">Тип заявки:</div>
                                <div class="col">
                                    @if($request['request_type'])
                                        {{ $request['request_type'] }}
                                    @else
                                        Нет данных
                                    @endif
                                </div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col">Статус:</div>
                                <div class="col">{{ $request['status'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col">Исполнители:</div>
                                <div class="col">
                                @foreach($userInfo as $user)
                                        {{ $user->name }} {{ $user->surname }}
                                @endforeach
                                </div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col">Оплачено:</div>
                                <div class="col">{{ $request->is_paid }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col">Номер заявки:</div>
                                <div class="col">{{ $request['id'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col">Инвентарный номер:</div>
                                <div class="col">
                                    @if($request['inventory_number'])
                                        {{ $request['inventory_number'] }}
                                    @else
                                        Нет данных
                                    @endif
                                </div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col">Серийный номер:</div>
                                <div class="col">
                                    @if($request['serial_number'])
                                    {{ $request['serial_number'] }}
                                    @else
                                        Нет данных
                                    @endif
                                </div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col">Адрес:</div>
                                <div class="col">
                                    @if($request->object_address)
                                        {{ $request->object_address }}
                                    @else
                                        Нет данных
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-4">
                <div class="col">
                    <div class="map back-white rounded-3 shadow-sm p-3">
                        <div class="row pb-3">
                            <div class="col">
                                <div class="fsize-20 font-500">Местонахождение объекта обслуживания</div>
                            </div>
                        </div>
                        <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d264.2571066229573!2d{{ $request['latitude'] }}!3d{{ $request['longitude'] }}!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1655399055913!5m2!1sru!2sru"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
