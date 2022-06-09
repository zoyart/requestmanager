@extends('layouts.layout')

@section('head-title')
    Клиент
@endsection

@section('content')

@section('page.name')
    Клиент "{{ $data[0]['name'] }}"
@endsection

    <div class="card__buttons pb-4">
        <div class="container">
            <div class="d-flex">
                <form action="{{ route('clients.destroy', ['client' => $data[0]['id']]) }}"
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
                <form action="{{ route('clients.edit', ['client' => $data[0]['id']]) }}"
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
    <div class="card__menu">
        <div class="container">
            <div class="col">
                <div class="d-flex">
                    <a class="tab rounded-top back-light font-dark text-center font-500" href="">Информация</a>
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
                                <div class="col-4">Название:</div>
                                <div class="col-8">{{ $data[0]['name'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-4">Адрес:</div>
                                <div class="col-8">{{ $data[0]['address'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-4">Email:</div>
                                <div class="col-8">{{ $data[0]['email'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-4">Условия работы с клиентом:</div>
                                <div class="col-8">{{ $data[0]['working_conditions'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-4">Дата создания:</div>
                                <div class="col-8">{{ $data[0]['created_at'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-4">Дата обновления:</div>
                                <div class="col-8">{{ $data[0]['updated_at'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-preson-form pt-5">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex" id="actions">
                                <button type="button" data-bs-target="#create" data-bs-toggle="modal"
                                        class="d-inline-block button-sm border-0 rounded-pill y-to-d me-3">
                                    Создать
                                </button>
                            </div>
                        </div>
                        <!-- Modal create -->
                        <form action="{{ route('contact-person.store') }}"
                              method="post">
                            @csrf
                            <div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false"
                                 tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Создать Контактное
                                                лицо</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3 form-group">
                                                <label for="name" class="form-label">Ваше имя</label>
                                                <input type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       id="name" name="name"
                                                       value="{{ old('name') }}"
                                                       placeholder="@error('name') {{ $message }} @enderror">
                                            </div>
                                            <div class="mb-3 form-group">
                                                <label for="surname" class="form-label">Ваша фамилия</label>
                                                <input type="text"
                                                       class="form-control @error('surname') is-invalid @enderror"
                                                       id="surname" name="surname"
                                                       value="{{ old('surname') }}"
                                                       placeholder="@error('surname') {{ $message }} @enderror">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email адрес</label>
                                                <input type="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       id="inputEmail"
                                                       aria-describedby="emailHelp" name="email"
                                                       value="" placeholder="@error('email') {{ $message }} @enderror">
                                                <div id="emailHelp" class="form-text">Мы никогда не будем делиться вашей
                                                    электронной почтой с кем-либо.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Пароль</label>
                                                <input type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       id="password" name="password"
                                                       placeholder="@error('password') {{ $message }} @enderror">
                                            </div>
                                            <div class="mb-4">
                                                <label for="password_confirmation" class="form-label">Подтвердите
                                                    пароль</label>
                                                <input type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       id="password_confirmation" name="password_confirmation"
                                                       placeholder="@error('password') {{ $message }} @enderror">
                                            </div>
                                            <input type="text" hidden name="client_id" value="{{ $data[0]['id'] }}">
                                            <div class="modal-footer d-flex justify-content-start">
                                                <button type="submit"
                                                        class="d-inline-block button-sm border-0 rounded-pill y-to-d">
                                                    Создать
                                                </button>
                                                <button type="button"
                                                        class="d-inline-block button-sm border-0 rounded-pill l-to-d"
                                                        data-bs-dismiss="modal">Отмена
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- EndModal -->
                    </div>
                </div>
            </div>
            <div class="row py-4">
                <div class="col">
                    <div class="general-info back-white rounded-3 shadow-sm p-4">
                        <div class="row pb-3">
                            <div class="col">
                                <div class="fsize-20 font-500">Контактные лица</div>
                            </div>
                        </div>
                        <div class="requests-table rounded bg-white">

                            <table class="table">
                                <thead class="">
                                <tr>
                                    <th scope="col" class="fw-normal py-3">Имя</th>
                                    <th scope="col" class="fw-normal py-3">Фамилия</th>
                                    <th scope="col" class="fw-normal py-3">Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dataContactPerson as $item)
                                    <tr>
                                        <td class="py-3">
                                            <a class=""
                                               href="{{ route('contact-person.show', ['contact_person' => $item['id']]) }}">
                                                {{ $item['name'] }}
                                            </a>
                                        </td>
                                        <td class="py-3">{{ $item['surname'] }}</td>
                                        <td class="py-3">{{ $item['email'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
