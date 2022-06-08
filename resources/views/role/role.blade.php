@extends('layouts.layout')

@section('head-title')
    Права доступа для сотрудников
@endsection

@section('content')
    <div class="page__name py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title font-500 fsize-20">
                        Права доступа для сотрудников
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="role-form pb-2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex" id="actions">
                        <form action="{{ route('role.create') }}" method="get">
                            <button type="submit"
                                    class="d-inline-block button-sm border-0 rounded-pill y-to-d me-3">
                                Создать роль
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card__menu pt-4">
        <div class="container">
            <div class="col">
                <div class="d-flex">
                    <a class="tab rounded-top font-dark text-center font-500" href="{{ route('account.show', [
                        'account' => \Illuminate\Support\Facades\Auth::user()->id]) }}">Аккаунт</a>
                    <a class="tab rounded-top font-dark text-center font-500" href="{{ route('employees.index') }}">Сотрудники</a>
                    <a class="tab rounded-top back-light font-dark text-center font-500" href="">Права доступа</a>
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
                            <th scope="col" class="fw-normal py-3">Название роли</th>
                            <th scope="col" class="fw-normal py-3">Дата создания</th>
                            <th scope="col" class="fw-normal py-3">Дата обновления</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td class="py-3">
                                    <a class="" href="">
                                        {{ $item['name'] }}
                                    </a>
                                </td>
                                <td class="py-3">{{ $item['created_at'] }}</td>
                                <td class="py-3">{{ $item['updated_at'] }}</td>
                                <td style="width: 10%">
                                    <button type="button" data-bs-target="#create" data-bs-toggle="modal"
                                            class="d-inline-block button-sm border-0 rounded-pill y-to-d me-3">
                                        Редактировать
                                    </button>
                                </td>
                                <td style="width: 10%">
                                    <button type="button" data-bs-target="#create" data-bs-toggle="modal"
                                            class="d-inline-block button-sm border-0 rounded-pill y-to-d me-3">
                                        Удалить
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
