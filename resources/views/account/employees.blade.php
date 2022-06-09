@extends('layouts.layout')

@section('head-title')
    Сотрудники
@endsection

@section('content')
    <div class="page__name py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title font-500 fsize-20">
                        Сотрудники
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="employees-form pb-2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex" id="actions">
                        <button type="button" data-bs-target="#create" data-bs-toggle="modal"
                                class="d-inline-block button-sm border-0 rounded-pill y-to-d me-3">
                            Создать аккаунт
                        </button>
                    </div>
                </div>
                <!-- Modal create -->
                <form action="{{ route('employees.store') }}"
                      method="post">
                    @csrf
                    <div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false"
                         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Создать аккаунт для сотрудника</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="name my-3">
                                        <label for="name" class="form-label">Имя</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="surname my-3">
                                        <label for="surname" class="form-label">Фамилия</label>
                                        <input type="text" class="form-control" id="surname" name="surname">
                                    </div>
                                    <div class="email my-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="position mb-3">
                                        <label class="form-label">Должность</label>
                                        <input type="text" class="form-control" id="position" name="position">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Пароль</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="mb-4">
                                        <label for="password_confirmation" class="form-label">Подтвердите пароль</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d">
                                        Создать
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
            </div>
        </div>
    </div>
    <div class="card__menu pt-4">
        <div class="container">
            <div class="col">
                <div class="d-flex">
                    <a class="tab rounded-top font-dark text-center font-500" href="{{ route('account.show', [
                        'account' => \Illuminate\Support\Facades\Auth::user()->id]) }}">Аккаунт
                    </a>
                    <a class="tab rounded-top back-light font-dark text-center font-500" href="">Сотрудники</a>
                </div>
            </div>
        </div>
    </div>
    <div class="content__table py-4 min-vh-100 back-light">
        <div class="container">
            <div class="row">
                <div class="requests-table rounded bg-white">
                        <table class="table">
                            <thead class="">
                            <tr>
                                <th scope="col" class="fw-normal py-3">Имя</th>
                                <th scope="col" class="fw-normal py-3">Фамилия</th>
                                <th scope="col" class="fw-normal py-3">Должность</th>
                                <th scope="col" class="fw-normal py-3">Email</th>
                                <th scope="col" class="fw-normal py-3">Дата создания</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td class="py-3">
                                        <a class=""
                                           href="{{ route('employees.show', ['employee' => $item['id']]) }}">
                                            {{ $item['name'] }}
                                        </a>
                                    </td>
                                    <td class="py-3">{{ $item['surname'] }}</td>
                                    <td class="py-3">{{ $item['position'] }}</td>
                                    <td class="py-3">{{ $item['email'] }}</td>
                                    <td class="py-3">{{ $item['created_at'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
@endsection
