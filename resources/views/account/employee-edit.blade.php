@extends('layouts.layout')

@section('head-title')
    Редактирование
@endsection

@section('content')

@section('page.name')
    Изменение данных пользователя "{{ $data[0]['name'] }} {{ $data[0]['surname'] }}"
@endsection

<div class="cards back-light min-vh-100">
    <div class="container">
        <form action="{{ route('employees.update', ['employee' => $data[0]['id']])}}"
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
                                    <input name="position" class="form-control" type="text" id="position"
                                           value="{{ $data[0]['position'] }}">
                                </div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-3">Пароль:</div>
                                <div class="col-9">???</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-5">
                <div class="col">
                    <div class="general-info back-white rounded-3 shadow-sm p-4">
                        <div class="row pb-3">
                            <div class="col">
                                <div class="fsize-20 font-500">Права пользователя</div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-lg">
                                <div class="requests">
                                    <div class="font-500 fsize-20 pb-2">Заявки</div>
                                    <hr class="dropdown-divider">
                                    <ul class="font-text">
                                        @foreach($request as $item)
                                            <li>
                                                <input type="checkbox" class="check form-check-input me-2"
                                                       name="permissions[]"
                                                       value="{{ $item['id'] }}"
                                                       @if($user->hasPermissionTo($item->name)) checked @endif>
                                                <label class="form-check-label" for="exampleCheck{{ $item['id'] }}">
                                                    {{ $item['name'] }}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="price_lists">
                                    <div class="font-500 fsize-20 pb-2">Прайс листы</div>
                                    <hr class="dropdown-divider">
                                    <ul class="font-text">
                                        @foreach($priceList as $item)
                                            <li>
                                                <input type="checkbox" class="check form-check-input me-2"
                                                       name="permissions[]"
                                                       @if($user->hasPermissionTo($item->name)) checked @endif
                                                       value="{{ $item['id'] }}">
                                                <label class="form-check-label" for="exampleCheck{{ $item['id'] }}">
                                                    {{ $item['name'] }}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="employees">
                                    <div class="font-500 fsize-20 pb-2">Сотрудники</div>
                                    <hr class="dropdown-divider">
                                    <ul class="font-text">
                                        @foreach($employee as $item)
                                            <li>
                                                <input type="checkbox" class="check form-check-input me-2"
                                                       name="permissions[]"
                                                       @if($user->hasPermissionTo($item->name)) checked @endif
                                                       value="{{ $item['id'] }}">
                                                <label class="form-check-label" for="exampleCheck{{ $item['id'] }}">
                                                    {{ $item['name'] }}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="row my-3">
                            <div class="col-lg">
                                <div class="clients">
                                    <div class="font-500 fsize-20 pb-2">Клиенты</div>
                                    <hr class="dropdown-divider">
                                    <ul class="font-text">
                                        @foreach($client as $item)
                                            <li>
                                                <input type="checkbox" class="check form-check-input me-2"
                                                       name="permissions[]"
                                                       @if($user->hasPermissionTo($item->name)) checked @endif
                                                       value="{{ $item['id'] }}">
                                                <label class="form-check-label" for="exampleCheck{{ $item['id'] }}">
                                                    {{ $item['name'] }}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="font-500 fsize-20 pb-2">Контактные лица</div>
                                <hr class="dropdown-divider">
                                <ul class="font-text">
                                    @foreach($contact_person as $item)
                                        <li>
                                            <input type="checkbox" class="check form-check-input me-2"
                                                   name="permissions[]"
                                                   @if($user->hasPermissionTo($item->name)) checked @endif
                                                   value="{{ $item['id'] }}">
                                            <label class="form-check-label" for="exampleCheck{{ $item['id'] }}">
                                                {{ $item['name'] }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-lg">
                                <div class="font-500 fsize-20 pb-2">Склад</div>
                                <hr class="dropdown-divider">
                                <ul class="font-text">
                                    @foreach($inventory as $item)
                                        <li>
                                            <input type="checkbox" class="check form-check-input me-2"
                                                   name="permissions[]"
                                                   @if($user->hasPermissionTo($item->name)) checked @endif
                                                   value="{{ $item['id'] }}">
                                            <label class="form-check-label" for="exampleCheck{{ $item['id'] }}">
                                                {{ $item['name'] }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
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

